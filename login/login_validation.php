<?php
session_start();

include_once 'dbh_connect.php';

if(isset($_POST['submit']))
{
    $mail = $_POST['email'];
    $pass = $_POST['pass'];

    $sql = 'SELECT * FROM users WHERE userEmail = ? and userPass = ?';
    $stmt = connect()->prepare($sql);
    $stmt->execute([$mail,$pass]);
    $row = $stmt->fetch();

    if($row['userEmail'] == $mail and $row['userPass'] == $pass){
        echo "<p>Welcome $mail</p>";
        $_SESSION['email'] = $mail;
        header('location:../index.php');
    }else{
        header("location:../login.php?error='email-password-err'");
    }

}