<?php
include_once '../Includes/dbh_connect.php';

$id = $_GET['id'];
$del = "DELETE FROM login_data WHERE id = '$id'";
$stmt = connect()->query($del);

header('location:admin.php');