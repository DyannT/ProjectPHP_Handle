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
    require_once './conn.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];;
    }
    $sqlcmd = "SELECT * FROM `sinhvien` where `id` = $id ";
    $qr = mysqli_query($conn, $sqlcmd);
    $row = mysqli_fetch_array($qr);
    ?>
    <div style="display: flex;justify-content: center;">
        <div>
            <form action="" method="POST" class="containerr">
                <p><label>ID <input type="integer" name="id" value="<?php echo $row['id'] ?>"></label></p>
                <p><label>UserName <input type="text" name="username" value = "<?php echo $row['username'] ?>"></label></p>
                <p><label>Email <input type="email" name="email" value = "<?php echo $row['email'] ?>"></label></p>
                <p><label>Address <input type="text" name="address" value = "<?php echo $row['address'] ?>"></label></p>
                <p><label><input type="submit" value="Submit" name="submit" ></label></p>
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
                $sql_upp = " UPDATE `sinhvien` SET `id`='$id',`username`='$username',`email`='$email',`address`='$address' WHERE `id` = $id";
                $qr = mysqli_query($conn, $sql_upp);
                header("location: ../../admin.php");
            }
            ?>
        </div>
    </div>


</body>

</html>