<?php 

include 'config.php';

$data = $_POST;

$query = "insert into users values ('', '" . $data['fullname'] . "', '" . $adta['endate'] . "', 
            '" . $data['regnum'] . "', '" . $data['password']. "', '" . $data['email'] . "', 
            '" . $data['email'] . "', '" . $data['role'] . "',  '', '', '', '')";
$res = mysqli_query($con, $query);
if ($res) {
  header('location: ../index.php');
} else {
  header('location: ../error.php');
}