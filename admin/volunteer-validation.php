<?php
require_once '../login/dbh_connect.php';
require_once "Mailer/PHPMailerAutoload.php";

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $nid = $_POST['nid'];
    $phone = $_POST['phone'];
    $street = $_POST['street'];
    
    $sql = "SELECT * FROM volunteers WHERE NID = '$nid'";
    $stmt = connect()->query($sql);
    $result = $stmt->fetch();

    if($result){
        header('location:../volunteer.php');
    }else{
        $sql = "INSERT INTO volunteers(NID,Name,Email,Phone,Street) VALUES(?,?,?,?,?)";
        $stmt = connect()->prepare($sql);
        $stmt->execute([$nid,$name,$email,$phone,$street]);

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username ='deshcharity1@gmail.com';
        $mail->Password ='Desh!@#Charity';
        $mail->SMTPSecure = 'tls';
        $mail->Port= 587;

        $mail->setFrom('deshcharity1@gmail.com', 'Desh Charity');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject="Request Accepted";
        $mail->Body="<p>Dear $name, </p> <h4>We are happy to have you interested to work with us. We appreciate your humanitarian effort! Keep smiling 🙂<br></h4>
            <br><br>
            With regrads,<br>
            Forhad Uddin<br><br>
            Admin, Desh Charity<br>
            Chittagong - 4200, Ave-5<br>
            Get in touch @: 01810000000<br>
            For more, visit: <a href=\"http://localhost/Desh-Charity\">Desh Charity</a>";
        $mail->send();
        header('location:../index.php');
    }
}