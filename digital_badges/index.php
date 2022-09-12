<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dissertation</title>
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
  <style>* { font-family: 'Montserrat', sans-serif; }

     body {
     background-image: url("bg.jpg");
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
      background: #fff;
      color: #555;
    }
    input[type="password"], input[type="text"], select, input[type="date"], input[type="email"] {
      border-radius: 10px;
      padding: .5em;
      margin: .2em auto;
    }
    #new {
      display: none;
    }
    .log{
      float:left;
      margin-left:15%;
    }
    .reg{
      float:right;
      margin-right:15%;
    }
    </style>
</head>
<body>
  <h2 style="text-align: center;">Digital Badging System</h2>
  <div class="log">
  <form action="core/login.php" method="post" style="width: 12em; margin: 1em auto; background: #eee;
  padding: 1em 2em; box-shadow: 0 3px 7px #aaa; border-radius: 1em;">
    <h2 style="margin-top: 0;">Login</h2>
    <input type="email" name="email" placeholder="john@school.com">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Sign In">
  </form>
  </div>
  <div class="reg">
  <form action="core/create.php" method="post" style="width: 12em; margin: 1em auto; background: #eee;
  padding: 1em 2em; box-shadow: 0 3px 7px #aaa; border-radius: 1em;">
    <h2 style="margin-top: 0;">Register</h2>
    <input type="text" name="fullname" id="full" placeholder="Fullname">
    <input type="text" name="regnum" id="reg" placeholder="Reg.num">
    <input type="email" name="email" id="email" placeholder="john@school.com">
    <input type="password" name="password" onkeydown="check()" placeholder="Password">
    <input type="date" name="endate"><br>
    <select name="role">
      <option value="student">Student</option>
      <option value="admin">Lecturer</option>
    </select>
    <br>
    <input type="submit" value="Create" id="newac">
  </form>
  </div>
</body>
</html>
<script>
  function check(){
    var f = document.getElementById('full').value.length;
    var r = document.getElementById('reg').value.length;
    var e = document.getElementById('email').value.length;
    if (f != 0 && r != 0 && e != 0) {
      document.getElementById('newac').style.display = 'block';
    } else {
      document.getElementById('newac').style.display = 'none';
    }
  }
</script>