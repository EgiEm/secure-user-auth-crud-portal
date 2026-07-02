<?php
require_once ("config/config.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = md5($_POST['password']); //Hash password

    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);
    if($result->num_rows == 1){
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin.php");
        exit();
    }else{
        $error = "Invalid Username or Password!";
    }
}
?>