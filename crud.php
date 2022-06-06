<?php
session_start();
include('config/conn.php');

if (isset($_POST['save_cus'])) {
    $name_ct = $_POST['name_ct'];
    $surname_ct = $_POST['surname_ct'];
    $phone_ct = $_POST['phone_ct'];
    $email_ct = $_POST['email_ct'];
    $adress_ct = $_POST['adress_ct'];

    $query = "INSERT INTO customer(name_ct,surname_ct,phone_ct,email_ct,adress_ct) VALUES(:name_ct,:surname_ct,:phone_ct,:email_ct,:adress_ct)";
    $query_run = $conn->prepare($query);

    $data = [
        ':name_ct' => $name_ct,
        ':surname_ct' => $surname_ct,
        ':phone_ct' => $phone_ct,
        ':email_ct' => $email_ct,
        ':adress_ct' => $adress_ct
    ];
    $query_execute = $query_run->execute($data);

    if ($query_execute) {
        $_SESSION['message'] = "เพิ่มข้อมูลสำเร็จ";
        header('Location: index.php');
        exit(0);
    } else {
        $_SESSION['message'] = "เพิ่มข้อมูลไม่สำเร็จ";
        header('Location: index.php');
        exit(0);
    }
}

if (isset($_POST['edit_cus'])) {
    $customer_id = $_POST['customer_id'];
    $name_ct = $_POST['name_ct'];
    $surname_ct = $_POST['surname_ct'];
    $phone_ct = $_POST['phone_ct'];
    $email_ct = $_POST['email_ct'];
    $adress_ct = $_POST['adress_ct'];

    try {
        $query = "UPDATE customer SET name_ct = :name_ct, surname_ct = :surname_ct, phone_ct = :phone_ct, email_ct = :email_ct, adress_ct = :adress_ct WHERE customer_id = :customer_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':name_ct' => $name_ct,
            ':surname_ct' => $surname_ct,
            ':phone_ct' => $phone_ct,
            ':email_ct' => $email_ct,
            ':adress_ct' => $adress_ct,
            ':customer_id' => $customer_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "แก้ไขข้อมูลสำเร็จ";
            header('Location: index.php');
            exit(0);
        } else {
            $_SESSION['message'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header('Location: index.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['delete_cus'])) {
    $customer_id = $_POST['delete_cus'];
    try {
        $query = "DELETE FROM customer WHERE customer_id = :customer_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':customer_id' => $customer_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "ลบข้อมูลสำเร็จ";
            header('Location: index.php');
            exit(0);
        } else {
            $_SESSION['message'] = "ลบข้อมูลไม่สำเร็จ";
            header('Location: index.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['save_odr'])) {
    $order_name = $_POST['order_name'];
    $order_quanlity = $_POST['order_quanlity'];
    $order_cost = $_POST['order_cost'];
    $order_date = $_POST['order_date'];

    $query = "INSERT INTO orders(order_name,order_quanlity,order_cost,order_date) VALUES(:order_name,:order_quanlity,:order_cost,:order_date)";
    $query_run = $conn->prepare($query);

    $data = [
        ':order_name' => $order_name,
        ':order_quanlity' => $order_quanlity,
        ':order_cost' => $order_cost,
        ':order_date' => $order_date
    ];
    $query_execute = $query_run->execute($data);

    if ($query_execute) {
        $_SESSION['message'] = "เพิ่มข้อมูลสำเร็จ";
        header('Location: index_orders.php');
        exit(0);
    } else {
        $_SESSION['message'] = "เพิ่มข้อมูลไม่สำเร็จ";
        header('Location: index_orders.php');
        exit(0);
    }
}

if (isset($_POST['edit_odr'])) {
    $order_id = $_POST['order_id'];
    $order_name = $_POST['order_name'];
    $order_quanlity = $_POST['order_quanlity'];
    $order_cost = $_POST['order_cost'];
    $order_date = $_POST['order_date'];

    try {
        $query = "UPDATE orders SET order_name = :order_name, order_quanlity = :order_quanlity, order_cost = :order_cost, order_date = :order_date WHERE order_id = :order_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':order_name' => $order_name,
            ':order_quanlity' => $order_quanlity,
            ':order_cost' => $order_cost,
            ':order_date' => $order_date,
            ':order_id' => $order_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "แก้ไขข้อมูลสำเร็จ";
            header('Location: index_orders.php');
            exit(0);
        } else {
            $_SESSION['message'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header('Location: index_orders.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['delete_odr'])) {
    $order_id = $_POST['delete_odr'];
    try {
        $query = "DELETE FROM orders WHERE order_id = :order_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':order_id' => $order_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "ลบข้อมูลสำเร็จ";
            header('Location: index_orders.php');
            exit(0);
        } else {
            $_SESSION['message'] = "ลบข้อมูลไม่สำเร็จ";
            header('Location: index_orders.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}