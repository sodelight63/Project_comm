<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>หน้าแรก</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <?php if (isset($_SESSION['message'])) : ?>
                    <h5 class="alert alert-success"><?= $_SESSION['message']; ?></h5>
                <?php
                    unset($_SESSION['message']);
                endif;
                ?>
                <div class="card">
                    <div class="card-body">
                        <h3>ข้อมูลลูกค้า
                            <a href="Add_Cus.php" class="btn btn-primary float-end">เพิ่มข้อมูล</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>รหัส</th>
                                    <th>ชื่อ</th>
                                    <th>นามสกุล</th>
                                    <th>เบอร์โทร</th>
                                    <th>อีเมล</th>
                                    <th>ที่อยู่</th>
                                    <th>แก้ไข</th>
                                    <th>ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require 'config/conn.php';
                                $sql = "SELECT * FROM customer";
                                $stmt = $conn->query($sql);
                                while ($row = $stmt->fetch()) {
                                ?>
                                    <tr>
                                        <td><?= $row['customer_id']; ?></td>
                                        <td><?= $row['name_ct']; ?></td>
                                        <td><?= $row['surname_ct']; ?></td>
                                        <td><?= $row['phone_ct']; ?></td>
                                        <td><?= $row['email_ct']; ?></td>
                                        <td><?= $row['adress_ct']; ?></td>
                                        <td><a href="Edit_Cus.php?customer_id=<?= $row['customer_id'] ?>" class="btn btn-primary">แก้ไข</a></td>
                                        <td>
                                            <form action="crud.php" method="POST">
                                                <button type="submit" name="delete_cus" value="<?= $row['customer_id'] ?>" class="btn btn-danger">ลบ</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>