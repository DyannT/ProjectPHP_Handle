<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-admin.css">
    <title>Document</title>
    <style>
        .containerr {
            text-align: left;
            overflow: hidden;
            margin: 0 auto;
            display: table;
            padding: 0 0 8em 0;
        }
    </style>
</head>

<body>
    <?php
    require_once "../php/conn.php";
    ?>
    <div style="display: flex;justify-content: center;">
        <div>
            <form action="" method="POST" class="containerr">
                <p><label>ID <input type="integer" name="id"></label></p>
                <p><label>UserName <input type="text" name="username"></label></p>
                <p><label>Email <input type="email" name="email"></label></p>
                <p><label>Address <input type="text" name="address"></label></p>
                <p><label><input type="submit" value="Submit" name="submit"></label></p>
            </form>
            <?php

            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $address = $_POST['address'];
            }

            if (empty($username)) {
                echo "Please enter your username<br/>";
            }

            if (empty($id)) {
                echo "Please enter your id<br/>";
            }

            if (empty($email)) {
                echo "Please enter your email<br/>";
            }
            if (empty($address)) {
                echo "Please enter your address";
            }
            if (!empty($username) && !empty($email) && !empty($address) && !empty($id)) {
                $sql_add = "INSERT INTO `sinhvien`(`id`, `username`, `email`, `address`) VALUES ('$id','$username','$email','$address')";
                $qr = mysqli_query($conn, $sql_add);
                header("location: ../../admin.php");
            }
            ?>
        </div>
    </div>


</body>

</html>