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

// badges 
$query = "select * from lessons where user_id = " . $uid;
$badges = array();
$res = mysqli_query($con, $query);
if ($res->num_rows > 0) {
  while($row_badge = mysqli_fetch_array($res)) {
    $badges[] = $row_badge;
  }
}

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
  <title>Profile</title>
  <style>
    * { font-family: 'Montserrat', sans-serif }
    input[type="text"] {
      border: none;
    }
    textarea {
      border: none;
      resize: none;
      width: 90%;
    }
    fieldset { margin-bottom: 1em; }
    td { border: 1px solid #ddd;padding: .5em;}
    h4 { font-size: 22px;}
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
    fieldset {
      border: 2px solid #eee;
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
  <div style="max-width: 760px; width: 100%; margin: 1em auto;">
    <form action="./core/update_profile.php">
      <fieldset>
        <legend>Personal Information <br> R.N: <b><?= $data['reg_num'] ?></b></legend>
        <input type="text" name="sfullname" style="font-size: 25px;" value="<?= $data['fullname'] ?>" />
        <p>Entry Date: <b><input type="text" name="sen_date" value="<?= $data['en_date'] ?>" /></b></p>
        <p>Email: <input type="text" name="semail" value="<?= $data['email'] ?>" /></p>
      </fieldset>
      <input type="hidden" name="suid" value="<?= $data['id'] ?>">
      <fieldset>
        <legend>Professional Information</legend>
        <br> </br>
        <h4>About me</h4>
        <textarea name="sdescription"><?= $data['description'] ?></textarea>
        <h4>Skills</h4>
        <textarea name="sskills"><?= $data['skills'] ?></textarea>
        <h4>Experience</h4>
        <textarea name="sexperience"><?= $data['experience'] ?></textarea>
        <h4>Titles & Coursework</h4>
        <textarea name="stitles"><?= $data['titles'] ?></textarea>
        <h4>Achievement Badges</h4>
        <table>
          <tr>
            <td>Subject</td>
            <td>Feedback</td>
            <td>Professor</td>
            <td>Badge</td>
          </tr>
          <?php foreach($badges as $b): ?>
              <tr>
                <td style="width: 25%;"><?= $b['title'] ?></td>
                <td style="width: 25%;"><?= $b['feedback'] ?></td>
                <td style="width: 25%;"><?= $b['prof_name'] ?></td>
                <td style="width: 25%;"><img src="core/<?= $b['badge'] ?>" width="100px" height="90px"/></td>
              </tr>
          <?php endforeach; ?>
        </table>
      </fieldset>

      <fieldset>
        <legend id="actions">Click to toggle actions</legend>
        <div id="actions-box">
          <input type="submit" value="Save Changes" />
        </div>
      </fieldset>
    </form>

  </div>
</body>
</html>
<script>
  var flag = 0
  document.getElementById('actions-box').style.display = 'none';
  document.getElementById('actions').addEventListener('click', function(){
    if (flag == 1) {
      document.getElementById('actions-box').style.display = 'block';
      flag = 0;
    } else {
      document.getElementById('actions-box').style.display = 'none';
      flag = 1;
    }
  });
</script>