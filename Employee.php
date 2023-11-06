<?php 
    
    session_start();
    if(!isset($_SESSION{'username'})){

        $_SESSION['message']= "กรุณาล็อกอินก่อนใช้งานระบบ";
        header('location:login.php');
    }
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['usermane']);
        header('location:login.php');
    }
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link href="css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>

<body>
  <main>
    <nav class="py-2 bg-body-tertiary border-bottom">
      <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
          <li class="nav-item"><a href="Employee.php" class="nav-link link-dark px-2 active"
              aria-current="page">ข้อมูลพนักงาน</a></li>
          <li class="nav-item"><a href="#" class="nav-link link-dark px-2">อนุมัติการลา </a></li>
          <li class="nav-item"><a href="#" class="nav-link link-dark px-2">รายการการลางานประจำปี</a></li>
          <li class="nav-item"><a href="#" class="nav-link link-dark px-2">รายงานการเข้า-ออกงานประจำเดือน</a></li>
          <li class="nav-item"><a href="Employee.php" class="nav-link link-dark px-2">เวลาทำงาน</a></li>
        </ul>

        <ul class="nav">
          <li class="nav-item"><a href="#" class="nav-link link-dark px-2">สวัสดี
              <?php echo $_SESSION['login_Name']?></a></li>
          <li class="nav-item"><a href="Employee.php?logout='1'" class="nav-link link-dark px-2">ออกจากระบบ</a></li>
        </ul>
      </div>
    </nav>
  </main>
  <script src="js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
</body>

</html>