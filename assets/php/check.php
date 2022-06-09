<?php
      require_once 'conn.php';

      
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
    }

    if(empty($username)){
        echo "Please enter your username<br/>";
    }

    if(empty($id)){
        echo "Please enter your id<br/>";
    }
    
    if(empty($email)){
        echo "Please enter your email<br/>";
    }
    if(empty($address)){
        echo "Please enter your address";
    }
    if(!empty($username) && !empty($email) && !empty($address) && !empty($id)){
        $sql_add = "INSERT INTO `sinhvien`(`id`, `username`, `email`, `address`) VALUES ('$id','$username','$email','$address')";
        $qr = mysqli_query($conn,$sql_add);
        header("location: index.php");
    }
?>