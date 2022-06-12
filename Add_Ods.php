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
    <title>เพิ่มข้อมูลการสั่งซื้อ</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h3>เพิ่มข้อมูลลูกค้า
                            <a href="orders_data.php.php" class="btn btn-danger float-end">ย้อนกลับ</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="crud.php" method="POST">
                            <div class="col mb-3">
                                <label>ชื่ออะไหล่:</label>
                                <input type="text" name="order_name" class="form-control" />
                            </div>
                            <div class="col mb-3">
                                <label>จำนวน:</label>
                                <input type="text" name="order_quanlity" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>ราคาต้นทุน:</label>
                                <input type="text" name="order_cost" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>วันที่สั่งซื้อ:</label>
                                <input type="date" name="order_date" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_odr" class="btn btn-primary">เพิ่มข้อมูล</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>