<?php
$servername = "localhost";
$username = "root";
$password = "";
// Create connection
$conn = new mysqli($servername, $username, $password);

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS QLGAME";
$conn->query($sql);

$conn->close(); 
?>