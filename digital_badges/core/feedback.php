<?php 

include 'config.php';

$lid = $_GET['lid'];
$fd = $_GET['feed'];

$query = "update lessons set feedback = '$fd' where id = " . $lid;
$res = mysqli_query($con, $query);
if ($res) {
  header('location: ../prof_dashboard.php');
} else {
  header('location: ../error.php');
}