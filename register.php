<?php
require_once("config.php");
$error="";
$success="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);

    if(empty($username) || empty($email) || empty($password)){
        $error='All fields are required';
    }else{
        $check_user="SELECT * FROM users WHERE username = '$username' OR email='$email'";
        $result=$conn->query($check_user);

        if($result->num_rows>0){
            $error="Username or email already exists";
        }else{
            $hashed_password=md5($password);
            $sql="INSERT INTO users(username,email,password) VALUES ('$username','$email','$hashed_password')"
            if($conn->query($sql)===TRUE){
                $success="Registration successful! You can now <a href='login.php'>Login Here </a>.";
            }else{
                $error="Error:" . $conn->error;
            }
        }
    }
}
?>