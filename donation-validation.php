<?php

include_once 'login/Includes/dbh_connect.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $dType = $_POST['dType'];
    $comments = $_POST['comments'];
    $file = $_POST['file'];

    $search = "SELECT * FROM donation WHERE donorEmail = '$email'";
    $stmt = connect()->query($search);
    $row = $stmt->fetch();

    if($row['donorEmail'] == $email && $row['comments'] == $comments){
        header('location:donate.php?error=already-submitted');
        }
    else{
        $sql = "INSERT INTO donation(donorName,donorEmail,donorAddress,donorPhone,donationType,comments,image) VALUES(?,?,?,?,?,?,?)";
        $stmt = connect()->prepare($sql);
        $stmt->execute([$name,$email,$address,$phone,$dType,$comments,$file]);
        header('location:donate.php?value=success');
    }
}