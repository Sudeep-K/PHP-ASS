<?php
    if (empty($_REQUEST['id'])) {
        header("location: ../home.php?status=failed&&message=No ID specified for the request");
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Company</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  </head>
    <body>
    <div class="container mt-5">
        <div class="card mb-3 p-3" style="max-width: 500px">
            <form action="" method="post">
                <p class="fs-3 fw-bold">Update Company info</p>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="company_name" id="name" required>
                <div class="invalid-feedback">
                    Please enter company name
                </div>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" id="address" required>
                <div class="invalid-feedback">
                    Please enter a valid company address
                </div>   
            </div>
            <button type="submit" name="btn_update" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
    if(isset($_POST['btn_update'])) {
        $status = "failed";
        $message = "Unknown";
        if(!empty($_POST['company_name']) && !empty($_POST['address'])) {
            $name = $_POST['company_name'];
            $address = $_POST['address'];
            $id = $_REQUEST['id'];

            $con = mysqli_connect("localhost","root","root","crud_php");
            if($con) {
                $sql = "update company set company_name='".$name."', address='".$address."' where id='".$id."'";
                if(mysqli_query($con, $sql)) {
                    if (mysqli_affected_rows($con)) {
                        $status = "success";
                        $message = "Company updated successfully";
                    }
                    else {
                        $message = "Failed to update company";
                    }
                }
                    else {
                    $message = "Failed to update company";
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