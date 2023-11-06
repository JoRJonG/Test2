<?php 
require ('connect.php');
session_start();
?>
<!DOCTYPE html>
<html  data-bs-theme="light">
<head>
<link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<Link href="css/_alert.scss">
<title>Login</title>
<link href="css/sign-in.css" rel="stylesheet">

</head>
<body class="text-center" >
  <main class="form-signin w-100 m-auto">
        <form method="post" action="login_db.php">
      
          <?php include ('message.php'); ?>

          <h1 class="h3 mb-3 fw-normal">เข้าสู่ระบบ</h1>

          <div class="form-floating">
            <input type="text" class="form-control" name="username" id="floatingInput" placeholder="Username">
            <label for="floatingInput">Username</label>
          </div>


          <div class="form-floating">
            <input type="password" class="form-control" name="password" id="floatingInput" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>

          <div class="checkbox mb-3">
            <label>
              <input type="checkbox"  name="remember" value="1"  id="remember"> Remember me
            </label>
          </div>

          <button class="w-100 btn btn-lg btn-primary" type="submit">เข้าสู่ระบบ</button>
          <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2023</p>
      </form>
  </main>

</body>
</html>
