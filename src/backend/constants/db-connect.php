<?php
session_start();

$servername="localhost";
$username="root";
$password="";
$database="safiri-tours";

$conn= new mysqli($servername, $username, $password, $database);

if($conn){
   // echo "Database connected successfully";
} else {
    echo "Database connection failed";
}

?>