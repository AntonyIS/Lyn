<?php
//recieve data(id) from detail.php
//update the data using id
//take user back to detail page
include 'config.php';
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
$id = $username = $email = '';
if(isset($_POST['btnUpdate'])){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        //    update the user using the id
    }else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $sql = "UPDATE `users` SET `username`='$username',`email`='$email',`image`='$target_file' WHERE id='$id'";
            if(mysqli_query($conn, $sql)){
                $sucess = "Update successful";
                header('location:detail.php?id='.$id);
                exit();
            }else{
                $update_error = "Update unsuccessful";
                header('location:detail.php?update_error_msg'.$id);
                exit();
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }




}


?>
