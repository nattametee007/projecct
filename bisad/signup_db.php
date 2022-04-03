<?php 

    session_start();
    require_once 'config/db.php';

    if (isset($_POST['signup'])) {
        $name = $_POST['name'];
        $sex = $_POST['sex'];
        $birth = $_POST['birth'];
        $address = $_POST['address'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $urole = 'user';

        if (empty($name)) {
            $_SESSION['error'] = 'กรุณากรอกชื่อ';
            header("location: index.php");
        } else if (empty($sex)) {
            $_SESSION['error'] = 'กรุณากรอกเพศ';
            header("location: index.php");
        } else if (empty($birth)) {
            $_SESSION['error'] = 'กรุณากรอกวันเกิด';
            header("location: index.php");
        } else if (empty($address)) {
            $_SESSION['error'] = 'กรุณากรอกที่อยู่';
            header("location: index.php");
        } else if (empty($username)) {
            $_SESSION['error'] = 'กรุณากรอกชื่อผู้ใช้';
            header("location: index.php");
        } else if (empty($password)) {
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
            header("location: index.php");
        } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
            header("location: index.php");
        } else if (empty($c_password)) {
            $_SESSION['error'] = 'กรุณายืนยันรหัสผ่าน';
            header("location: index.php");
        } else if ($password != $c_password) {
            $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน';
            header("location: index.php");
        } else {
            try {

                $check_username = $conn->prepare("SELECT username FROM users WHERE username = :username");
                $check_username->bindParam(":username", $username);
                $check_username->execute();
                $row = $check_username->fetch(PDO::FETCH_ASSOC);

                if ($row['username'] == $username) {
                    $_SESSION['warning'] = "มีชื่อผู้ใช้นี้อยู่ในระบบแล้ว <a href='signin.php'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                    header("location: index.php");
                } else if (!isset($_SESSION['error'])) {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO users(name, sex, birth, address, username, password, urole) 
                                            VALUES(:name, :sex, :birth, :address, :username, :password, :urole)");
                    $stmt->bindParam(":name", $name);
                    $stmt->bindParam(":sex", $sex);
                    $stmt->bindParam(":birth", $birth);
                    $stmt->bindParam(":address", $address);
                    $stmt->bindParam(":username", $username);
                    $stmt->bindParam(":password", $passwordHash);
                    $stmt->bindParam(":urole", $urole);
                    $stmt->execute();
                    $_SESSION['success'] = "สมัครสมาชิกสำเร็จ <a href='signin.php' class='alert-link'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                    header("location: index.php");
                } else {
                    $_SESSION['error'] = "การสมัครสมาชิกไม่สำเร็จ";
                    header("location: index.php");
                }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }


?>