<?php
include_once '../login/dbh_connect.php';
require "Mailer/PHPMailerAutoload.php";

$status = $_GET['status'];
if($status == 'approved'){
    $id = $_GET['id'];
    $sql = "SELECT * FROM donation_req WHERE donateID = '$id'";
    $stmt = connect()->query($sql);
    $row = $stmt->fetch();

    if($row > 0){
        $sql = "INSERT INTO approved_donation(Name,Phone,Address,Status) VALUES(?,?,?,?)";
        $stmt = connect()->prepare($sql);
        $stmt->execute([$row['donorName'],$row['donorPhone'],$row['donorAddress'],'Yet To Collect']);
         
        $sql = "DELETE FROM donation_req WHERE donateID = '$id'";
        $stmt = connect()->query($sql);
        header('location:admin.php'); 
    }
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username ='deshcharity1@gmail.com';
    $mail->Password ='Desh!@#Charity';
    $mail->SMTPSecure = 'tls';
    $mail->Port= 587;

    $mail->setFrom('deshcharity1@gmail.com', 'Desh Charity');
    $mail->addAddress($row['donorEmail']);

    $mail->isHTML(true);
    $mail->Subject="Donation Accepted";
    $mail->Body="<p>Dear donor, </p> <h4>We are so much pleased to announce that your donation request has been accepted with ❤. A Volunteer of Desh Charity will collect those donation soon. Good Luck.<br></h4>
        <br><br>
        With regrads,<br>
        Forhad Uddin<br><br>S
        CEO, Desh Charity<br>
        Chittagong - 4200, Ave-5<br>
        Get in touch @: 01810000000<br>
        For more, visit: <a href=\"http://localhost/Desh-Charity/\">Desh Charity</a>";
    $mail->send();
}

elseif($status == 'rejected'){
    $id = $_GET['id'];
    $sql = "SELECT * FROM donation_req WHERE donateID = '$id'";
    $stmt = connect()->query($sql);
    $row = $stmt->fetch();

    if($row > 0){
        $sql = "INSERT INTO rejected_donation(Name,Phone,Address) VALUES(?,?,?)";
        $stmt = connect()->prepare($sql);
        $stmt->execute([$row['donorName'],$row['donorPhone'],$row['donorAddress']]);

        $sql = "DELETE FROM donation_req WHERE donateID = '$id'";
        $stmt = connect()->query($sql);
        header('location:admin.php');  
    }
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username ='deshcharity1@gmail.com';
    $mail->Password ='Desh!@#Charity';
    $mail->SMTPSecure = 'tls';
    $mail->Port= 587;

    $mail->setFrom('deshcharity1@gmail.com', 'Desh Charity');
    $mail->addAddress($row['donorEmail']);

    $mail->isHTML(true);
    $mail->Subject="Donation Rejected";
    $mail->Body="<p>Dear donor, </p> <h4>We are so much sorry 😌 to receive your donation due to some policy issues that doesn't meet our requirements.<br></h4>
        <br><br>
        With regrads,<br>
        Forhad Uddin<br><br>
        CEO, Desh Charity<br>
        Chittagong - 4200, Ave-5<br>
        Get in touch @: 01810000000<br>
        For more, visit: <a href=\"http://localhost/Desh-Charity/\">Desh Charity</a>";
    $mail->send();
}
