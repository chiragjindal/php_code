<?php
$servername = "localhost";
$username = "root";
$password ='';
$db="testdb";

// Create connection
$db = new mysqli($servername, $username, $password,$db) or die("error");

//echo "done";
// Check connection
/*if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";*/
?> 