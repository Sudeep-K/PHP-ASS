<?php
    $status = "failed";
    $message = "Unknown";
    if(!empty($_POST['company_name']) && !empty($_POST['address'])) {
        $company_name = $_POST['company_name'];
        $address = $_POST['address'];

        $con = mysqli_connect("localhost","root","root","crud_php");
        if($con) {
            $sql = "insert into company (company_name, address)
                    values ('".$company_name."', '".$address."')";
            if(mysqli_query($con, $sql)) {
                if (mysqli_affected_rows($con)) {
                    $status = "success";
                    $message = "Company created successfully";
                }
                else {
                    $message = "Failed to create company";
                }
            }
                else {
                $message = "Failed to create company";
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
?>