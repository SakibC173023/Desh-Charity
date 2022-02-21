<?php
include_once '../login/Includes/dbh_connect.php';

$status = $_GET['status'];
if($status == 'approved'){
    $id = $_GET['id'];
    $sql = "SELECT * FROM donation WHERE donateID = '$id'";
    $stmt = connect()->query($sql);
    $row = $stmt->fetch();

    if($row > 0){
        $sql = "SELECT * FROM approved_donation";
        $stmt = connect()->query($sql);
        while($result = $stmt->fetch())
        {
            if($result['Name'] == $row['donorName'] && $result['Phone'] == $row['donorPhone']){
                header('location:admin.php?error=already-approved');
                die(); 
            }
        }
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
        $sql = "SELECT * FROM rejected_donation";
        $stmt = connect()->query($sql);
        while($result = $stmt->fetch())
        {
            if($result['Name'] == $row['donorName'] && $result['Phone'] == $row['donorPhone']){
                header('location:admin.php?error=already-rejected');
                die(); 
            }
        }
        $sql = "INSERT INTO rejected_donation(Name,Phone,Address) VALUES(?,?,?)";
        $stmt = connect()->prepare($sql);
        $stmt->execute([$row['donorName'],$row['donorPhone'],$row['donorAddress']]);
        header('location:admin.php');    
    }
}
