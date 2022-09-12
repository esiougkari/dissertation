<?php 

include 'config.php';

$data = $_REQUEST;

$query = "update users set fullname = '" . $data['sfullname'] . "',
              en_date = '" . $data['sen_date'] . "',
              email = '" . $data['semail'] . "',
              description = '". $data['sdescription'] ."',
              skills = '" . $data['sskills'] . "',
              experience = '" . $data['sexperience']. "', 
              titles = '" . $data['stitles'] . "' where id = " . $data['suid'] . " ";

$res = mysqli_query($con, $query);
if ($res) {
  header('location: ../profile.php');
} else {
  header('location: ../error.php');
}