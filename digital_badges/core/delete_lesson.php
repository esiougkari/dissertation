<?php 

include 'config.php';

$lid = $_GET['l'];

$query = "delete from lessons where id = " . $lid;
$res = mysqli_query($con, $query);
if ($res) {
  header('location: ../prof_dashboard.php');
} else {
  header('location: ../error.php');
}