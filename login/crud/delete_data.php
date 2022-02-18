<?php
include_once '../Includes/dbh_connect.php';

$id = $_GET['id'];
$del = "DELETE FROM users WHERE userID = '$id'";
$stmt = connect()->query($del);

header('location:admin.php');