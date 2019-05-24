<?php
include 'database-connection.php';

if(isset($_POST["upload"]))
{
    $sid = $_POST["sid"];

    if ($_FILES["img_file"]["type"] == "image/jpg" || $_FILES["img_file"]["type"] == "image/jpeg" || $_FILES["img_file"]["type"] == "image/png")
    {   
        if (move_uploaded_file($_FILES["img_file"]["tmp_name"], "../../profileimg/".$_FILES["img_file"]["name"]))
        {
            $img = $_FILES["img_file"]["name"];
            $img = mysqli_real_escape_string($dbcon, $img);

            $sql = "UPDATE tbl_students SET profileimg = '$img' WHERE sid = '$sid'";

            mysqli_query($dbcon, $sql);
            
            header("Location: ../change-image.php");
            
            //mysqli_query($dbcon, "INSERT INTO activities (student, activity) VALUES ('$student', '$student has just changed their profile picture')");
        }
        else
        {
            echo "Error uploading image";
        }
    }
    else
    {
         echo ("Error description: " . mysqli_error($dbcon));
         header("Location: ../change-image.php");
    }
}

?>