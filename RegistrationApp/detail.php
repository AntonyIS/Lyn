<?php
include 'header.php';
include 'config.php';

$username = $email =$id ='';
if(isset($_GET['id'])){
//    grab id
    $id = $_GET['id'];
//    use id to fetch data from db
    $sql = "SELECT `id`, `username`, `email`, `password`,`image` FROM `users` WHERE id='$id'";
    $results = mysqli_query($conn, $sql)or die($id);

//    convert data ino assoc array
        $row = mysqli_fetch_assoc($results);
//        grab individual data
        $username = $row['username'];
        $email = $row['email'];
        $id = $row['id'];
        $image= $row['image'];
}
?>
<!--Diplay data with update form-->
<div class="container">
    <div class="row">
        <div class="col col-sm-12 col-md-6 col-lg-6 col-xl-6 shadow-lg p-1 mb-5 bg-white">
            <?php
            if(strlen($image)==0){
                echo "<img src='images/img.jpg' alt='' class='card-img' style='height: 218px;' id='$id'>";
            }else{
                echo "<img src='$image' alt='' class='card-img' style='height: 218px;' id='$id'>";
            }
            ?>

            <div class="caption">
               <p class="lead"><?php echo $username?></p>
               <p class="lead"><?php echo $email?></p>
            </div>
        </div>
        <?php


        if (isset($_SESSION['loggedin'])){
            $email_session = $_SESSION['user'];
            if ($email !== $email_session){
                include 'onlyuser.php';
            }
//            include 'onlyuser.php';
        }
        ?>
    </div>
</div>






<?php include 'footer.php'?>
