<?php
    $status = "failed";
    $message = "Unknown";
    if(!empty($_REQUEST['id'])) {
        $id = $_REQUEST['id'];

        $con = mysqli_connect("localhost","root","root","crud_php");
        if($con) {
            $sql = "delete from employee where id=$id";
            if(mysqli_query($con, $sql)) {
                if (mysqli_affected_rows($con)) {
                    $status = "success";
                    $message = "Employee record deleted successfully";
                }
                else {
                    $message = "Failed to delete employee record";
                }
            }
                else {
                $message = "Failed to delete employee record";
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