<?php
include 'header.php';
include 'config.php';

$email = $password ='';
$email_err = $password1_err = $password_err ='';

//1.grab form data
//    -check if user exists in the system(db), if true ask them user to login, if false continue the process
//2.store data into a database
if(isset($_POST['loginBtn'])){
//    grab individual data
    $email= $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);
//check if user exists in the database
    $sql = "SELECT `id`, `username`, `email`, `password` FROM `users` WHERE email = '$email' AND password='$password'";
    $results = mysqli_query($conn, $sql);
    if(mysqli_num_rows($results)){
        while($row = mysqli_fetch_assoc($results)) {
//            grab individual data
            $id = $row['id'];
            $email = $row['email'];
//         start  session
            session_start();
//            create sessions
            $_SESSION['loggedin'] = true;
//            add email session
            $_SESSION['user'] = $email;
            $_SESSION['id'] = $id;
//            send user to index page
            $success_msg = "Login successful.";
            header('location:index.php?success_msg=' . $success_msg);
            exit();
        }
        }
    }
?>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <?php
            if(isset($_GET['signup_err'])){
//                   grab error message
                $error = $_GET['signup_err'];
                echo "<div class='alert alert-danger'>";
                echo $error;
                echo "</div>";
            }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                <!--    action: defines the php file that the data needs to be sent to-->
                <!--    use the method=post only when sending data that has to secured-->

                <div class="form-group">
                    <label for="">Email</label>
                    <span><?php echo $email_err ?></span><br>
                    <input type="email" name="email" placeholder="Enter email" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <span><?php echo $password_err ?></span><br>
                    <input type="password" name="password" placeholder="Enter password"  class="form-control">
                </div>
                <input type="text" name="hiddentext" value="This is the data that was hidden" hidden>
                <input type="submit" name="loginBtn" value="Login">
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>












<?php include 'footer.php';?>
