<?php
session_start();
require_once '../login/dbh_connect.php';
require_once "Mailer/PHPMailerAutoload.php";

if(isset($_SESSION['email'])){
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $street = $_POST['street'];
        $reqType = $_POST['reqType'];
        $reason = $_POST['reason'];
        
        $sql = "SELECT * FROM users WHERE userEmail = '$email'";
        $stmt = connect()->query($sql);
        $result = $stmt->fetch();
        $uid = $result['userID'];

  
        $sql = "INSERT INTO help_req(uid,name,email,phone,address,req_type,reason) VALUES(?,?,?,?,?,?,?)";
        $stmt = connect()->prepare($sql);
        $stmt->execute([$uid,$name,$email,$phone,$street,$reqType,$reason]);

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
        $mail->Subject="Help Request Pending";
        $mail->Body="<p>Dear $name, </p> <h4>We have received your help request. We will contact you ASAP.<br></h4>
            <br><br>
            With regrads,<br>
            Forhad Uddin<br><br>
            Admin, Desh Charity<br>
            Chittagong - 4200, Ave-5<br>
            Get in touch @: 01810000000<br>
            For more, visit: <a href=\"http://localhost/Desh-Charity\">Desh Charity</a>";
        $mail->send();
        header('location:../request-form.php?status=request-success');
        
    }
}else{
    header("location:../request-form.php?error=login-required");
}