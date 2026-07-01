<?php
session_start();
if(!isset($_SESSION['admin_logged_in'])){
    header("Location: login.php");
    exit();
}

require_once("config.php");

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
if(!$result){
    die("Database query failed: ". $conn->error);
}
?>
