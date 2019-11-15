<?php
include 'header.php';
include 'config.php';

$usernmae = $email ='';
if(isset($_GET['id'])){
//    grab id
    $id = $_GET['id'];
//    use id to fetch data from db
    $sql = "SELECT `id`, `username`, `email`, `password` FROM `users` WHERE id='$id'";
    $results = mysqli_query($conn, $sql)or die($id);

//    convert data ino assoc array
        $row = mysqli_fetch_assoc($results);
//        grab individual data
        $username = $row['username'];
        $email = $row['email'];
}
?>
<!--Diplay data with update form-->
<div class="container">
    <div class="row">
        <div class="col col-sm-12 col-md-6 col-lg-6 col-xl-6 shadow-lg p-1 mb-5 bg-white">
            <img src="images/orange.jpeg" alt="" class="img-thumbnail">
            <div class="caption">
               <p class="lead"><?php echo $username?></p>
               <p class="lead"><?php echo $email?></p>
            </div>
        </div>
        <div class="col col-sm-12 col-md-6 col-lg-6 col-xl-6 shadow-lg p-1 mb-5 bg-white">
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" value="<?php echo $username?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" value="<?php echo $email?>"  class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-info btn-lg" value="Update">
                    <input type="submit" class="btn btn-danger btn-lg" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>






<?php include 'footer.php'?>
