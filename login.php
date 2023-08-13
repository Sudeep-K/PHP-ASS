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
            <form action="" method="post">
                <p class="fs-3 fw-bold">Login</p>
            <div class="mb-3">
                <label for="name" class="form-label">FullName</label>
                <input type="text" class="form-control" id="name" required>
                <div class="invalid-feedback">
                    Please enter your name
                </div>
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" required>
                <div class="invalid-feedback">
                    Please enter your date of birth
                </div>
            </div>
            <button type="submit" name="btn" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
    if(isset($_POST["btn"])) {
        header("location: home.php");
    }
?>