<?php
//1.server name
//2.owner
//3.password
//4.databse name
$servername = "localhost";
$owner ="root";
$password ="";
$database = "MITSATCLASSDB";

//function mysqli_connect()
//1.connection

//connection to the databse
$conn = mysqli_connect($servername,$owner,$password,$database);

if(!$conn){
    die("Connection failed".mysqli_connect_error());
}
echo "Conection successful";






?>