<?php
//here we are setting up the connection to the mysql db
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "testcms";
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>