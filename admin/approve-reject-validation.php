<?php
include_once '../login/Includes/dbh_connect.php';

$status = $_GET['status'];
if($status == 'approved'){
    $id = $_GET['id'];
    $sql = "SELECT * FROM donation WHERE donateID = '$id'";
    $stmt = connect()->query($sql);
    $row = $stmt->fetch();

    if($row > 0){
        $sql = "INSERT INTO approved_donation(Name,Phone,Address,Status) VALUES(?,?,?,?)";
        $stmt = connect()->prepare($sql);
        $stmt->execute([$row['donorName'],$row['donorPhone'],$row['donorAddress'],'Not Collected Yet']);
        header('location:admin.php');
    }
}
elseif($status == 'rejected'){
    $id = $_GET['id'];
    $sql = "SELECT * FROM donation WHERE donateID = '$id'";
    $stmt = connect()->query($sql);
    $row = $stmt->fetch();

    if($row > 0){
        $sql = "DELETE FROM donation WHERE donateID = ?";
        $stmt = connect()->prepare($sql);
        $stmt->execute([$id]);
        header('location:admin.php');
    }
}
