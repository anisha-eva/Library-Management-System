<?php
session_start();
include 'db_connect.php';

if(isset($_POST['login'])){

$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

if($role == 'admin'){

$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
$_SESSION['admin']=$username;
header("Location: dashboard.php");
}else{
echo "Invalid Admin Login";
}

}

if($role == 'member'){

$sql = "SELECT * FROM member WHERE ID='$username' AND PASSWORD='$password'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
$_SESSION['member']=$username;
header("Location: member_dashboard.php");
}else{
echo "Invalid Member Login";
}

}

}
?>
