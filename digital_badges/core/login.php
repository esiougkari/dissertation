<?php 

include 'config.php';

$_email = mysqli_real_escape_string($con, $_POST['email']);
$_pass = mysqli_real_escape_string($con, $_POST['password']);

$query = "select * from users where email = '$_email' and password = '$_pass'";

$res = mysqli_query($con, $query);

if ($res->num_rows == 1) {
  $user = mysqli_fetch_array($res);
  session_start();
  $_SESSION['u'] = $user;
  if ($user['role'] == 'student') {
    header('location: ../dashboard.php');
  } 
  if ($user['role'] == 'admin') {
    header('location: ../prof_dashboard.php');
  }
} else {
  header('location: ../error.php');
}
