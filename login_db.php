<?php
    session_start();
    include('config/conn.php');

    if(isset($_POST['login'])){
        $username_ct = $_POST['username_ct'];
        $password_ct = $_POST['password_ct'];
    }
    if(empty($username_ct) || empty($password_ct)){
        $_SESSION['error_fill'] = "กรุณากรอกข้อมูลให้ครบถ้วน";
        header("Location: Login.php");
        exit;
    }else{
        $select_stmt = $conn->prepare("SELECT COUNT(username_ct) AS count_user, password_ct FROM customer WHERE username_ct = :username_ct");
        $select_stmt->bindParam(':username_ct', $username_ct);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

        if($row['count_user'] == 0){
            $_SESSION['error_user'] = "ชื่อผู้ใช้นี้ไม่มีผู้ใช้ในระบบ";
            header("Location: Login.php");
            exit;
        }
        else{
            if(password_verify($password_ct, $row['password_ct'])){
                $_SESSION['username_ct'] = $username_ct;
                $_SESSION['is_login'] = true;
                header("Location: index_customer.php");
        }else{
            $_SESSION['error_pass'] = "รหัสผ่านไม่ถูกต้อง";
            header("Location: Login.php");
            exit;
        }
    }
}
