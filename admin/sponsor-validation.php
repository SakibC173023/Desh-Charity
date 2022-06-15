<?php
session_start();
require_once '../login/dbh_connect.php';
require_once "Mailer/PHPMailerAutoload.php";

if(isset($_SESSION['email'])){
    if(isset($_POST['submit'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $street = $_POST['street'];
        $comment = $_POST['comment'];
        
        $sql = "SELECT * FROM users WHERE userEmail = '$email'";
        $stmt = connect()->query($sql);
        $result = $stmt->fetch();
        $uid = $result['userID'];

  
        $sql = "INSERT INTO sponsor_req(uid,fname,lname,email,phone,address,comment) VALUES(?,?,?,?,?,?,?)";
        $stmt = connect()->prepare($sql);
        $stmt->execute([$uid,$fname,$lname,$email,$phone,$street,$comment]);

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username ='deshcharity1@gmail.com';
        $mail->Password ='ytwmxjzihkifrzzw';
        $mail->SMTPSecure = 'tls';
        $mail->Port= 587;

        $mail->setFrom('deshcharity1@gmail.com', 'Desh Charity');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject="Sponsor Request Accepted";
        $mail->Body="<p>Dear $fname, </p> <h4>We are happy to hear that you are interested to be a part of our Sponsorship program. We appreciate your humanitarian effort! We will contact you soon.<br></h4>
            <br><br>
            With regrads,<br>
            Forhad Uddin<br><br>
            Admin, Desh Charity<br>
            Chittagong - 4200, Ave-5<br>
            Get in touch @: 01810000000<br>
            For more, visit: <a href=\"http://localhost/Desh-Charity\">Desh Charity</a>";
        $mail->send();
        header('location:../sponsor-form.php?status=request-success');
        
    }
}else{
    header("location:../sponsor-form.php?error=login-required");
}