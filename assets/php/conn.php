<?php
    $conn = mysqli_connect("localhost","root","","them-sua-xoa_hs");
    //Test connection
    if($conn){
        mysqli_query($conn,"SET NAMES 'UTF-8'");
        // echo "True";
    }
    // else{
    //     echo "False";
    // }
?>