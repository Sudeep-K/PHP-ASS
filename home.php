<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up | New user</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  </head>
    <body>
    <div class="container mt-5">

        <div class="card mb-3 p-3" style="max-width: 500px">
            <?php
                if (!empty($_REQUEST['status']) && !empty($_REQUEST['message'])) {
                    if ($_REQUEST['status'] == 'success') {
                        ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?=$_REQUEST['message']?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?=$_REQUEST['message']?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                    }
                }
            ?>

                <form action="company/create.php" method="post">
                    <p class="fs-3 fw-bold">Create a new company</p>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="company_name" class="form-control" id="name" required>
                    <div class="invalid-feedback">
                        Please enter company name
                    </div>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="address" required>
                    <div class="invalid-feedback">
                        Please enter a valid company address
                    </div>   
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

    <p class="fs-3 fw-bold">Companies</p>
    <table class="table table-bordered" style="max-width: 800px">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Company Name</th>
                <th scope="col">Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $con = mysqli_connect("localhost","root","root","crud_php");
                if($con) {
                    $sql = "select * from company";
                    $res = mysqli_query($con, $sql);
                    if(mysqli_num_rows($res) != 0) {
                        while($row = mysqli_fetch_assoc($res)) {
                            ?>
                                <tr>
                                    <th><?=$row['id']?></th>
                                    <td><?=$row['company_name']?></td>
                                    <td><?=$row['address']?></td>
                                    <td>
                                        <a class="btn btn-warning" href="company/update.php?id=<?=$row['id']?>">Update</a>
                                        <a class="btn btn-danger" href="company/delete.php?id=<?=$row['id']?>">Delete</a>
                                    </td>
                                </tr>
                            <?php
                        }
                    }
                }
            ?>
        </tbody>
        </table>
    </div>
    
    <div class="container">
        <p class="fs-3 fw-bold">Employees</p>
        <table class="table table-bordered" style="max-width: 800px">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Salary</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Company</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $con = mysqli_connect("localhost","root","root","crud_php");
                    if($con) {
                        $sql = "select * from employee";
                        $res = mysqli_query($con, $sql);
                        if(mysqli_num_rows($res) != 0) {
                            while($row = mysqli_fetch_assoc($res)) {
                                ?>
                                    <tr>
                                        <th><?=$row['id']?></th>
                                        <td><?=$row['name']?></td>
                                        <td><?=$row['salary']?></td>
                                        <th><?=$row['dob']?></th>
                                        <td><?=$row['company']?></td>
                                        <td>
                                            <a class="btn btn-warning" href="employee/update.php?id=<?=$row['id']?>">Update</a>
                                            <a class="btn btn-danger" href="employee/delete.php?id=<?=$row['id']?>">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        }
                    }
                ?>
            </tbody>
            </table>
    </div>
    
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>