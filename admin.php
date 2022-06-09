<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style-admin.css">
    <title>Document</title>
</head>
<body>
<?php
  require_once './assets/php/conn.php';
?>
<table border="1" align="center"  class="container">
        <tr>
            <th>ID</th>
            <th>UserName</th>
            <th>Email</th>
            <th>Address</th>
            <th>Handle: <a href="./assets/php/add.php">Thêm</a></th>
        </tr>

        <?php 
            $sqlcmd = "SELECT * FROM `sinhvien` ";
            $qr = mysqli_query($conn,$sqlcmd);
            while($row = mysqli_fetch_assoc($qr)){?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><a href="./assets/php/update.php?id=<?php echo $row['id'] ?>" class="button">Sửa | </a><a href="./assets/php/del.php?id=<?php echo $row['id'] ?>" class="button">Xóa</a></td>
                </tr>
            <?php
            }
        ?>

    </table>
<!-- Query -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- <script src = "./assets/js/admin.js"></script>  -->
</body>
</html>