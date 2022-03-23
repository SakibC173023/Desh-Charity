<?php
include_once '../login/dbh_connect.php';
$id = $_GET['id'];

if($_GET['status'] === 'approved'){
    $sql = "SELECT * FROM approved_donation WHERE id = '$id'";
    $stmt = connect()->query($sql);
    $result = $stmt->fetch();
    if($result){
        $sql = "UPDATE approved_donation SET Status = 'Collected' WHERE id = '$id'";
        $stmt = connect()->query($sql);
        header('location:approved.php'); 
    }
}
