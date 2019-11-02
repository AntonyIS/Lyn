<?php
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
if($_SERVER['REQUEST_METHOD']== "POST"){
//    grab data from the $_POST[] superglobal
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2= $_POST['password2'];
    $secret= $_POST['hiddentext'];


    if(empty($username)){
        $username_err = "Please enter your username";
    }else{
        $username = clean_data($username);
    }
//    clean the received
//    $username = clean_data($username);
//    $email = clean_data($email);


//    scenario
//    1.empty data
//    2.spaces before data
//    3.forward slashe
//    4.html special characters
    function clean_data($data){
        $get_data = trim($data);
        $get_data = stripslashes($get_data);
        $get_data = htmlspecialchars($get_data);
        return $get_data;
    }

    echo $username."<br>";
    echo $email."<br>";
    echo $password1."<br>";
    echo $password2."<br>";
    echo $secret."<br>";


}

?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
<!--    action: defines the php file that the data needs to be sent to-->
<!--    use the method=post only when sending data that has to secured-->
    <h1>Signup here</h1>
    <span><?php echo $username_err ?></span><br>
    Username: <input type="text" name="username" placeholder="Enter username">

    <span><?php echo $email_err ?></span><br>
    Email: <input type="email" name="email" placeholder="Enter email" >

    <span><?php echo $password1_err ?></span><br>
    Password: <input type="password" name="password1" placeholder="Enter password" >

    <span><?php echo $password2_err ?></span><br>
    Confirm Password: <input type="password" name="password2" placeholder="Confirm password" >

    <input type="text" name="hiddentext" value="This is the data that was hidden" hidden>
    <input type="submit" name="myBtn" value="Signup">
</form>
assignment:
1.check if passwords match
2.check if the password is greater than 8 characters
3.Add bootstrap