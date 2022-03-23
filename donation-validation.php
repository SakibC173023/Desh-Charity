<?php

include_once 'login/dbh_connect.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $dType = $_POST['dType'];
    $comments = $_POST['comments'];

    $var1 = rand(1111,9999);
    $var2 = md5($var1);

    $fileName = $_FILES['image']['name'];
    $dstFolder = 'assets/donation-images/'.$var2.$fileName;
    $dstDb = 'assets/donation-images/'.$var2.$fileName;

    move_uploaded_file($_FILES['image']['tmp_name'],$dstFolder);

    $search = "SELECT * FROM donation_req WHERE donorEmail = '$email'";
    $stmt = connect()->query($search);
    $row = $stmt->fetch();

    if($row['donorEmail'] == $email && $row['comments'] == $comments){
        header('location:index.php?donationErr=already-submitted');
        }
    else{
        $sql = "INSERT INTO donation_req(donorName,donorEmail,donorAddress,donorPhone,donationType,comments,image) VALUES(?,?,?,?,?,?,?)";
        $stmt = connect()->prepare($sql);
        $stmt->execute([$name,$email,$address,$phone,$dType,$comments,$dstDb]);
        header('location:index.php?donationStts=donation-success');
    }
}