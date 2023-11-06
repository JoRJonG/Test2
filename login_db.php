<?php require ('connect.php');
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าจากฟอร์ม
    $username = $_POST["username"];
    $password = $_POST["password"];
    // คำสั่ง SQL สำหรับตรวจสอบข้อมูล
    $sql = "SELECT * FROM user_login WHERE login_User='$username' AND login_Pass='$password'";
    // ส่งคำสั่ง SQL ไปยังฐานข้อมูล
    $result = mysqli_query($conn, $sql);
    $objResult = mysqli_fetch_array($result);
    // ตรวจสอบว่ามีข้อมูลผู้ใช้งานหรือไม่
    if (mysqli_num_rows($result) == 1) {
      // Remember me  
        if($username === 'admin' && $password === 'password'){
            $cookie_name = "user";
            $cookie_value = $username . '|' . $password;
            $cookie_expire = time() + (86400 * 30); // 30 วัน
        
        if(isset($_POST['remember'])){
            $cookie_expire = time() + (86400 * 365);
        }
        setcookie($cookie_name, $cookie_value, $cookie_expire, "/");
    }
        // บันทึกข้อมูลผู้ใช้งานใน session
        $_SESSION['username'] = $username;
        $_SESSION['login_Name'] = $objResult['login_Name'];
        if($objResult['login_type'] == 1){
        // ลิ้งค์ไปยังหน้าหลัก
        header("Location: HR.php");
        exit(0);
        }
        header("Location: Employee.php");
        exit(0);
    } else {
        // หากไม่มีข้อมูลผู้ใช้งาน แสดงข้อความแจ้งเตือน
       // echo "Invalid username or password";
        $_SESSION['message'] = "ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง";
        header("location: login.php");
        exit(0);
    }
}

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($conn);
?>