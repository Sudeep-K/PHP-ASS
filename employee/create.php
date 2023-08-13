<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up | New employee</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  </head>
    <body>
    <div class="container mt-5">
        <div class="card mb-3 p-3" style="max-width: 500px">
            <form action="" method="post">
                <p class="fs-3 fw-bold">Sign up</p>
            <div class="mb-3">
                <label for="name" class="form-label">FullName</label>
                <input type="text" name="name" class="form-control" id="name" required>
                <div class="invalid-feedback">
                    Please enter your name
                </div>
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Salary</label>
                <input type="number" name="salary" class="form-control" id="salary" min=10000 max=50000>
                <div class="invalid-feedback">
                    Please enter a valid salary between 10,000 and 50,000
                </div>
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" name="dob" class="form-control" id="dob" required>
                <div class="invalid-feedback">
                    Please enter your date of birth
                </div>
            </div>
            <div class="mb-3">
                <label for="company" class="form-label">Company</label>
                <input type="text" name="company" class="form-control" id="company" required>
                <div class="invalid-feedback">
                    Please enter your company name
                </div>   
            </div>
            <button type="submit" name="btn_post" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
    if(isset($_POST['btn_post'])) {
        $status = "failed";
        $message = "Unknown";
        if(!empty($_POST['name']) && !empty($_POST['salary']) && !empty($_POST['dob']) && !empty($_POST['company'])) {
            $name = $_POST['name'];
            $salary = $_POST['salary'];
            $dob = $_POST['dob'];
            $company = $_POST['company'];

            $con = mysqli_connect("localhost","root","root","crud_php");
            if($con) {
                $sql = "insert into employee (name, salary, dob, company)
                        values ('".$name."', '".$salary."', '".$dob."', '".$company."')";
                if(mysqli_query($con, $sql)) {
                    if (mysqli_affected_rows($con)) {
                        $status = "success";
                        $message = "New Employee created successfully";
                    }
                    else {
                        $message = "Failed to create new employee";
                    }
                }
                    else {
                    $message = "Failed to create new employee";
                }
            }
            else {
                $message = "Database connection failed";
            }
        }
        else {
            $message = "All fields are required";
        }
        header("location: ../home.php?status=".$status."&&message=".$message);
    }
?>