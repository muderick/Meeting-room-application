<?php

$statusMsg = '';

//file upload path
$targetDir = "assets/images/";

$fileName = basename($_FILES["file"]["name"]);
$file_loc = $_FILES['file']['tmp_name'];
$targetFilePath = $targetDir . $fileName;
$uploadOk = 1;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
$file_type_lc = strtolower($fileType);
$error = $_FILES["file"]["error"];

$username = $_POST['username'];
$confirm_password = $_POST['c_password'];
$new_password = $_POST['new_password'];

if (isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
    include "conndb.php";

    //allow certain file formats
    $allowTypes = array('jpg', 'jpeg', 'png');
    if (in_array($fileType, $allowTypes)) {
        $new_file_name = uniqid($fileName, true);
        //upload file to server
        if (move_uploaded_file($file_loc, $targetFilePath)) {
            $statusMsg = "The file " . $fileName . " has been uploaded.";
            echo "<div style='height:90%;width:50%;'>
                <img src='$targetFilePath' height=190px>
                </div>
            ";
            // Insert into Database
            $sql = "UPDATE users SET user_name = '$username',
            password = '$new_password', profile_pic = '$profile_pic'
            WHERE user_name = '$user_name'";
            mysqli_query($conn, $sql);
            header("Location: settings.php?");

            $uploadOk = 1;
        } else {
            $statusMsg = "Sorry, there was an error uploading your file.";
            header("Location: settings.php?error=$statusMsg");
            $uploadOk = 0;
        }
    } else {
        $statusMsg = 'Sorry, only JPG, JPEG, PNG files are allowed to upload.';
        header("Location: settings.php?error=$statusMsg");
        $uploadOk = 0;
    }
} else {
    $statusMsg = 'Please select a file to upload.';
    header("Location: settings.php?error=$statusMsg");
    $uploadOk = 0;
}
//display status message
echo $statusMsg;
