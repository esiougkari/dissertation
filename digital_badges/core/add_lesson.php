<?php 

include 'config.php';

$_title = $_GET['title'];
$_pname = $_GET['pname'];
$_creds = $_GET['creds'];
$_deg = $_GET['degtype'];
$uid = $_GET['uid'];
$query = "insert into lessons values (null, '$_title', '$_pname', $_creds, '$_deg', '', '', $uid)";
$res = mysqli_query($con, $query);
if ($res) {
  header('location: ../dashboard.php');
} else {
  header('location: ../error.php');
}