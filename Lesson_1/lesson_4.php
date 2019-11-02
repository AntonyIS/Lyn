<?php
//$_SERVER['PHP_SELF']
////$_REQUEST
////Used to collect data from a HTML form
//// after submission
//
//
//?>
<h1>Sending data using the $_REQUEST[]</h1>
<form action="lesson_4.php" method="post">
    <input type="text" name="jina" placeholder="Enter name">
    <input type="submit" name="submitBtn" value="Send Data">
<!--    type:defines the type of data that the user MUST enter-->
<!--    type e.g: text,number,email,password,url,file-->
<!--    name: defines a variable that will store the actual data that the user entered-->
<!--    value:Defines the title of the variable-->
</form>

<?php
////e.g
//$car = 'Benz';
////1.use the $_SERVER to check the type of method used to collect data
////if the method is post, we will be able to grab the name from the form
//if($_SERVER['REQUEST_METHOD'] == "POST"){
////    collect the data from the $_REQUEST_METHOD variable
//    $name = $_REQUEST['jina'];
//    if(empty($name)){
//        echo "You submitted an empty form";
//    }else{
//        echo $name;
//    }
//}
//?>
<!--<!--$_POST[]-->-->
<!--<!--used to collect data from HTML form with the method='post'-->-->
<!--<h1>Sending data using the $_POST[]</h1>-->
<!--<form action="lesson_4.php" method="post">-->
<!--    <input type="text" name="jina" placeholder="Enter name">-->
<!--    <input type="submit" name="submitBtn" value="Send Data">-->
<!--</form>-->
<?php
//if($_SERVER['REQUEST_METHOD'] == "POST"){
////    collect the data from the $_REQUEST_METHOD variable
//    $name = $_POST['jina'];
//    if(empty($name)){
//        echo "You submitted an empty form";
//    }else{
//        echo $name;
//    }
//}
//
//?>
!--$_GET[]-->
<!--used to collect data from HTML form with the method='get'-->
<!--Can collect data sent in the url-->
<h1>Sending data using the $_GET[]</h1>
<a href="lesson_4.php?data=test name&data2=test data2">send data</a>
<!--<form action="lesson_4.php" method="get">-->
<!--    <input type="text" name="jina" placeholder="Enter name">-->
<!--    <input type="submit" name="submitBtn" value="Send Data">-->
<!--</form>-->
<?php
$data = $_GET['data'];
//$data2 = $_GET['data2'];
echo $data;
//echo $data2;
//if($_SERVER['REQUEST_METHOD'] == "GET"){
////    collect the data from the $_REQUEST_METHOD variable
//    $name = $_POST['jina'];
//    if(empty($name)){
//        echo "You submitted an empty form";
//    }else{
//        echo $name;
//    }
//}

?>




















