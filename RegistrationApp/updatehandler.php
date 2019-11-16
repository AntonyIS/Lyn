<?php
//recieve data(id) from detail.php
//update the data using id
//take user back to detail page
include 'config.php';

$id = $username = $email = '';
if(isset($_POST['btnUpdate'])){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

//    update the user using the id
    $sql = "UPDATE `users` SET `username`='$username',`email`='$email' WHERE id='$id'";


    if(mysqli_query($conn, $sql)){
        $sucess = "Update successful";
        header('location:detail.php?id='.$id);
        exit();
    }else{
        $update_error = "Update unsuccessful";
        header('location:detail.php?update_error_msg'.$id);
        exit();
    }


}


?>
