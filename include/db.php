<?php 

// $servername = "localhost";
$user = "root";
$pass = "";
// $database = "ussd";

// $con= new \mysqli($servername, $username, $password, $database);
$dbh = new PDO('mysql:host=localhost;dbname=ussd', $user, $pass);



// if ($con==false) {
//     die("Error connecting to database!". connect_error());
// }else {
//     echo "Connection successful!";
// 

// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'ussd');
 
/* Attempt to connect to MySQL database */
// try{
//     $dbh= new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
//     // Set the PDO error mode to exception
//     $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// } catch(PDOException $e){
//     die("ERROR: Could not connect. " . $e->getMessage());
// }
?>