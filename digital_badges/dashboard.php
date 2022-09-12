<?php 
include 'core/config.php';
session_start();
if (!isset($_SESSION['u'])){
  header('location: index.php');
} 
$uid = $_SESSION['u']['id'];
$query = "select * from users where id = " . $uid;
$data = array();
$res = mysqli_query($con, $query);
if ($res->num_rows == 1) {
  while($row = mysqli_fetch_array($res)) {
    $data[] = $row;
  }
}
$data = $data[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
  <title>Dashboard</title>
  <style>
    * {
      font-family: 'Montserrat', sans-serif;
    }
    th, td {
      padding: .5em;
      border: 1px solid #ddd;
    }

    input[type="text"],input[type="number"] {
      padding: .5em;
      border: 1px solid #eee;
    }

    a, input[type="submit"] {
      padding: .5em 1em;
      text-decoration: none;
      color: #fff;
      background: #555;
      display: inline-block;
      margin: .1em;
      border-radius: 10px;
    }
    a:hover, input[type="submit"]:hover {
      background: #bbb;
      color: #555;
    }
    .navbar-nav {
    margin-left: auto;
    }

  </style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link"><span><?= $data['fullname'] ?></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="index.php"><span>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
  <h3>Student's Portal</h3>
 
  <table>
    <tr>
      <th>Title</th>
      <th>Professor Name</th>
      <th>Credits</th>
      <th>Degree Type</th>
      <th>Badge</th>
      <th>Feedback</th>
    </tr>

    <tr>
      <form action="core/add_lesson.php">
        <input type="hidden" name="uid" value="<?= $_SESSION['u']['id'] ?>">
        <td><input type="text" name="title" placeholder="e.g: Artificial Intelligence"/></td>
        <td><input type="text" name="pname" placeholder="e.g: Dr. Jane Doe" /></td>
        <td><input type="number" name="creds" placeholder="e.g: 4"/></td>
        <td><input type="text" name="degtype" placeholder="e.g: BSc, MSc"/></td>
        <td colspan="2">Only a professor can change these properties.</td>
        <td><input type="submit" value="Add New Lesson"></td>
      </form>
    </tr>

    <?php
    $query = "select * from lessons where user_id = '" . $uid . "'";
    $res = mysqli_query($con, $query);
    while ($r = mysqli_fetch_array($res)): ?>
      <tr>
        <td><?= $r['title'] ?></td>
        <td><?= $r['prof_name'] ?></td>
        <td><?= $r['credits'] ?></td>
        <td><?= $r['degree_type'] ?></td>
        <td>
          <?php if ($r['badge'] != ''): ?>
            <img src="<?= 'core/'. $r['badge'] ?>" style="width:80px;height:70px;display:inline-block;margin-right: 1em;">
          <?php else: ?>
            <p>The lesson's not passed yet.</p>
          <?php endif; ?>
        </td>
        <td><?= ($r['feedback'] == '') ? 'Not yet reviewed by a professor.' : $r['feedback'] ?></td>
      </tr>
    <?php endwhile; ?>
  </table>  

</body>
</html>