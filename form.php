<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>ตารางข้อมูลพนักงาน</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12"><br>
                <h3>รายการข้อมูลพนักงาน<a href="formInsert_emp.php" class="btn btn-success float-end">+เพิ่มข้อมูล</a></h3>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>รหัสพนักงาน</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>เบอร์โทร</th>
                                <th>อีเมล</th>
                                <th>ที่อยู่</th>
                                <th>รายละเอียด</th>
                                <th>แก้ไข</th>
                                <th>ลบ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once 'conn.php';
                            $sql = "SELECT*FROM employee";
                            $stmt = $conn->query($sql);
                            while ($row = $stmt->fetch()) {
                            ?>
                                <tr>
                                    <td><?= $row['employee_id']; ?></td>
                                    <td><?= $row['name_emp']; ?></td>
                                    <td><?= $row['surname_emp']; ?></td>
                                    <td><?= $row['phone_emp']; ?></td>
                                    <td><?= $row['adress_emp']; ?></td>
                                    <td><a href="#" class="btn btn-info btn-sm">รายละเอียด</a></td>
                                    <td><a href="formedit_emp.php?employee_id=<?php echo $row['employee_id']; ?> " class="btn btn-warning btn-sm">แก้ไข</a></td>
                                    <td><a href="#" class="btn btn-ganger btn-sm">ลบ</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</body>

</html>