<?php
    require_once './conn.php';
?>

<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];;
    }
    
    $sql_del = "DELETE FROM `sinhvien` WHERE `id` = $id";
    $qr = mysqli_query($conn,$sql_del);
    header("location: ../../admin.php");

?>