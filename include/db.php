<?php 

// $servername = "localhost";
$username = "root";
$password = "12345";
// $database = "ussd";

// $dbh= new mysqli($servername, $username, $password, $database);

// if (!$dbh) {
//     die('Connection failed!'. connect_error());
// }else{
//     echo 'Connection successful!';
// }
$pdo = new PDO('mysql:host=localhost;dbname=ussd', $username, $password);

?>