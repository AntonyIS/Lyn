<?php
include 'header.php';
include 'config.php';

$username = $email = $password1 = $password2 =$secret ='';
$username_err = $email_err = $password1_err = $password2_err = $secret ='';

//1.grab form data
//    -check if user exists in the system(db), if true ask them user to login, if false continue the process
//2.store data into a database
if(isset($_POST['signupBtn'])){
//    grab individual data
    $username = $_POST['username'];
    $email= $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

//check if user exists in the database
    $sql = "SELECT * FROM `users` WHERE email='$email'";
    $results = mysqli_query($conn, $sql);
    if(mysqli_num_rows($results)){
//        if true user exists
        $signup_error = "User with the email exists. Please login";
        header('location:login.php?signup_err='.$signup_error);
        exit();
    }

//check password match and hashing
    if($password1 !== $password2){
        $password1_err = "Password did not match";
//        header();Defines the location the user should be taken:
        header('location:signup.php?password_err='.$password1_err);
        exit();//kills the flow
    }else{//if passwords match, hash the password using the md5() hashing function
        $password1 = md5($password1);
    }

    $sql = "INSERT INTO `users`(`id`, `username`, `email`, `password`) VALUES (NULL,'$username','$email','$password1')";
//    mysqli_query($conn,$sql);
    if(mysqli_query($conn, $sql)){
        $success = "Signup successful. Please login";
        header('location:login.php?success='.$success);
    }else{
        $signup_err = "Signup unsuccessful.Please signup again";
        header('location:signup.php?signup_err='.$signup_err);
//        echo "Somthing went wrong".$sql.mysqli_error($conn);
    }
//  Assignment  add 3 more fields : firstname, lastname, website url

//    message handling
//    reading data from db
//    Updating data in db
//    deleting data in db
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                <!--    action: defines the php file that the data needs to be sent to-->
                <!--    use the method=post only when sending data that has to secured-->
                <div class="form-group">
                    <label for="">Username</label>
                    <span><?php echo $username_err ?></span><br>
                    <input type="text" name="username" placeholder="Enter username" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <span><?php echo $email_err ?></span><br>
                    <input type="email" name="email" placeholder="Enter email" class="form-control" >
                </div>
                <?php
                if(isset($_GET['password_err'])){
//                   grab error message
                    $error = $_GET['password_err'];
                    echo "<div class='alert alert-danger'>";
                        echo $error;
                    echo "</div>";
                }
                ?>
                <div class="form-group">
                    <label for="">Password</label>
                    <span><?php echo $password1_err ?></span><br>
                    <input type="password" name="password1" placeholder="Enter password"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <span><?php echo $password2_err ?></span><br>
                    <input type="password" name="password2" placeholder="Confirm password" class="form-control" >
                </div>

                <input type="text" name="hiddentext" value="This is the data that was hidden" hidden>
                <input type="submit" name="signupBtn" value="Signup">
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>












<?php include 'footer.php';?>
