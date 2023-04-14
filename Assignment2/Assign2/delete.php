<?php
include "settings.php";

$conn = new mysqli(
    $host,
    $user,
    $pwd,
    $sql_db
);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$order_tb = "orders"; 

if (isset($_GET["deleteid"])) {
    $id = $_GET["deleteid"];

    $sql = "DELETE FROM $order_tb WHERE order_id=$id"; 
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        header("location:manager.php");
    } else {
        die(mysqli_error($conn)); 
    }
}
?>
