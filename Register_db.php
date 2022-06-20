<?php
session_start();
include('config/conn.php');
if (isset($_POST['Regis'])) {
    $title_ct = $_POST['title_ct'];
    $name_ct = $_POST['name_ct'];
    $surname_ct = $_POST['surname_ct'];
    $username_ct = $_POST['username_ct'];
    $password_ct = $_POST['password_ct'];
    $phone_ct = $_POST['phone_ct'];
    $email_ct = $_POST['email_ct'];
    $adress_ct = $_POST['adress_ct'];

    if (empty($title_ct) || empty($name_ct) || empty($surname_ct) || empty($username_ct) || empty($password_ct) || empty($phone_ct) || empty($email_ct) || empty($adress_ct)) {
        $_SESSION['error_fill'] = "กรุณากรอกข้อมูลให้ครบถ้วน";
        header("Location: Register.php");
        exit;
    } else {
        $select_stmt = $conn->prepare("SELECT COUNT(username_ct) AS count_user FROM customer WHERE username_ct = :username_ct");
        $select_stmt->bindParam(':username_ct', $username_ct);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

        if ($row['count_user'] != 0) {
            $_SESSION['exist_fill'] = "ชื่อผู้ใช้นี้มีผู้ใช้แล้ว";
            header("Location: Register.php");
            exit;
        } else {
            $password_ct = password_hash($password_ct, PASSWORD_DEFAULT);
            $insert_stmt = $conn->prepare("INSERT INTO customer (title_ct, name_ct, surname_ct, username_ct, password_ct, phone_ct, email_ct, adress_ct) VALUES (:title_ct, :name_ct, :surname_ct, :username_ct, :password_ct, :phone_ct, :email_ct, :adress_ct)");
            $insert_stmt->bindParam(':title_ct', $title_ct);
            $insert_stmt->bindParam(':name_ct', $name_ct);
            $insert_stmt->bindParam(':surname_ct', $surname_ct);
            $insert_stmt->bindParam(':username_ct', $username_ct);
            $insert_stmt->bindParam(':password_ct', $password_ct);
            $insert_stmt->bindParam(':phone_ct', $phone_ct);
            $insert_stmt->bindParam(':email_ct', $email_ct);
            $insert_stmt->bindParam(':adress_ct', $adress_ct);
            $insert_stmt->execute();

            if ($insert_stmt) {
                $_SESSION['username_ct'] = $username_ct;
                $_SESSION['is_login'] = true;
                header("Location: index_customer.php");
            } else {
                $_SESSION['error_insert'] = "ไม่สามารถนำเข้าข้อมูลได้";
                header("Location: Register.php");
                exit;
            }
        }
    }
}
