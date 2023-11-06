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
  <?php 
    require('connect.php');
    date_default_timezone_set('asia/bangkok');
    $date = date('Y-m-d');
    $dateshow = date('d-m-Y');
    $search_date_text = date('Y-m-d', strtotime($date));

    $sql = "SELECT * FROM `employee`";

    $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
    
    ?>

  <div class="container">
    <div class="row">
      <div class="col-11 bg-light p-9 border">
        <table class="table">
          <thead>
            <tr>
              <th colspan="7"> รายชื่อพนักงาน ณ วันที่ <?php echo $dateshow;?></th>
              
            </tr>
            <th>รหัสพนักงาน</th>
            <th>ซื้อ</th>
            <th>นามสกุล</th>
            <th>บริษัท</th>
            <th>สาขา</th>
            <th>แก้ไข</th>
            <th>ลบข้อมูล</th>
          </thead>

          <tbody>
            <?php
    while ($objResult = mysqli_fetch_array($objQuery)) {
    ?>
            <tr>
              <td><?php echo $objResult['emp_code']; ?></td>
              <td><?php echo $objResult['emp_first_name']; ?></td>
              <td><?php echo $objResult['emp_last_name']; ?></td>
              <td><?php echo $objResult['emp_company_id']; ?></td>
              <td><?php echo $objResult['emp_branch_id']; ?></td>
              <td><a href='userupdateform.php?emp_code=".$row[0]"'><button type="button" value='edit' class="btn btn-primary">แก้ไข</button></a></td>
              <td><a href='UserDelete.php?emp_code=$row[0]'><button type="button" value='edit' class="btn btn-danger">ลบ</button></a></td>
            </tr>
            <?php
            $json = array();
            $json[] = $objResult;
            $json = json_encode( $json, JSON_PRETTY_PRINT );
            echo $json;
    }
      ?>
      <th colspan="7"><a href='insertemp.php'><button type="button" value='addemp' class="btn btn-success">เพิ่มข้อมูลพนักงานใหม่</button></th>
          </tbody>
        </table>
      </div>


      <?php
  mysqli_close($conn); // ปิดฐานข้อมูล
 
  ?>


      <script src="js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
      </script>
</body>

</html>