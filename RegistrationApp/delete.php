<!--get the id-->
<!--delete record with the id-->

<?php
include 'config.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
   $sql = "DELETE FROM `users` WHERE id='$id'";
   if(mysqli_query($conn, $sql)){
       header('location:index.php?'.$id);
       exit();
   }

}


?>