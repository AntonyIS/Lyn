<?php
include 'header.php';
//Php form handling
//form validation
//form required
//complete form

//requirements:
//username
//email
//password
//declare empty  variables to store the data from the HTML form
$username = $email = $password1 = $password2 =$secret ='';
//declare empty  variables to store the errors that arise
$username_err = $email_err = $password1_err = $password2_err = $secret ='';
//receive data from the form
//check the method for sending data first
function clean_data($data){
    $get_data = trim($data);
    $get_data = stripslashes($get_data);
    $get_data = htmlspecialchars($get_data);
    return $get_data;
}

if($_SERVER['REQUEST_METHOD']== "POST"){
//    grab data from the $_POST[] superglobal
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2= $_POST['password2'];
    $secret= $_POST['hiddentext'];


//    if(empty($username)){
//        $username_err = "Please enter your username";
//    }else{
//        $username = clean_data($username);
//    }
//    clean the received
//    $username = clean_data($username);
//    $email = clean_data($email);


//    scenario
//    1.empty data
//    2.spaces before data
//    3.forward slashe
//    4.html special characters

//    check if the password match
    if($password1 !== $password2){
        echo "Password did not match";
    }
    if(strlen($password1) < 8){
        echo "Weak password";
    }

    echo $username."<br>";
    echo $email."<br>";
    echo $password1."<br>";
    echo $password2."<br>";
    echo $secret."<br>";


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
                <input type="submit" name="myBtn" value="Signup">
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>







<!---->
<!--assignment:-->
<!--1.check if passwords match-->
<!--2.check if the password is greater than 8 characters-->
<!--3.Add bootstrap-->
<?php include 'footer.php'?>