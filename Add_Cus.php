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
    <title>เพิ่มข้อมูล</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h3>เพิ่มข้อมูลลูกค้า
                        <a href="customer_data.php" class="btn btn-danger float-end">ย้อนกลับ</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="crud.php" method="POST">
                            <div class="col mb-3">
                                <label>ชื่อ:</label>
                                <input type="text" name="name_ct" class="form-control" />
                            </div>
                            <div class="col mb-3">
                                <label>นามสกุล:</label>
                                <input type="text" name="surname_ct" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>เบอร์โทร:</label>
                                <input type="text" name="phone_ct" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>อีเมล:</label>
                                <input type="text" name="email_ct" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>ที่อยู่:</label>
                                <input type="text" name="adress_ct" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_cus" class="btn btn-primary">เพิ่มข้อมูล</button>
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