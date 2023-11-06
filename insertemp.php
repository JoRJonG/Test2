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
          <li class="nav-item"><a href="#" class="nav-link link-dark px-2 active" aria-current="page">ข้อมูลพนักงาน</a>
          </li>
          <li class="nav-item"><a href="#" class="nav-link link-dark px-2">อนุมัติการลา </a></li>
          <li class="nav-item"><a href="#" class="nav-link link-dark px-2">รายการการลางานประจำปี</a></li>
          <li class="nav-item"><a href="#" class="nav-link link-dark px-2">รายงานการเข้า-ออกงาน</a></li>
          <li class="nav-item"><a href="#" class="nav-link link-dark px-2">รายงานการเข้างานสาย</a></li>
          <li class="nav-item"><a href="HR.php" class="nav-link link-dark px-2">หน้าหลัก</a></li>
        </ul>

        <ul class="nav">
          <li class="nav-item"><a href="#" class="nav-link link-dark px-2">สวัสดี
              <?php echo $_SESSION['login_Name']?></a></li>
          <li class="nav-item"><a href="HR.php?logout='1'" class="nav-link link-dark px-2">ออกจากระบบ</a></li>
        </ul>
      </div>
    </nav>
  </main>
<form action="insertdata.php" method="post" name="Employee">
<div class="container">
        <table class="table">
            <tr>
                <td>EmployeeID : </td>
                <td><input type="text" name="EmployeeID"></td>
            </tr>
            <tr>
                <td>Title : </td>
                <td><select name="Title">
                        <option value=นาย>นาย</option>
                        <option value=นางสาว>นางสาว</option>
                        <option value=นาง>นาง</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Name : </td>
                <td><input type="text" name="Name"></td>
            </tr>
            <tr>
                <td>Sex : </td>
                <td>
                    <input type="radio" name="Sex" value="ชาย"> ชาย
                    <input type="radio" name="Sex" value="หญิง"> หญิง
                </td>
            </tr>
            <tr>
                <td>Education : </td>
                <td><select name="Education">
                        <option value=ปริญญาตรี>ปริญญาตรี</option>
                        <option value=ปริญญาโท>ปริญญาโท</option>
                        <option value=อื่นๆ>อื่นๆ</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Start_Date : </td>
                <td><input type="date" name="Start_Date"></td>
            </tr>
            <tr>
                <td>Salary : </td>
                <td><input type="text" name="Salary"></td>
            </tr>
            <tr>
                <td>DepartmentID : </td>
                <td><input type="text" name="DepartmentID"></td>
            </tr>
        </table>

        <br>
        <input type="submit" value="Insert Data">
        <div class="container">
    </form>
</body>
</html>