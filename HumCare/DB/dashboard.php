<?php
session_start();
$conn=mysqli_connect("localhost","root","","humcare");

if(!$conn){
    die("Connection Failed..".mysqli_connect_error());
}
if (!isset($_SESSION['role'])) {
    header("Location: auth/login.php");
    exit;
}

switch ($_SESSION['role']) {
    case 'admin':
        header("Location:../dashboard/Admin.php");
        break;

    case 'doctor':
        header("Location: ../dashboard/Doc-Dash.php");
        break;

    case 'patient':
        header("Location: ../dashboard/Patient-Dash.php");
        break;

    default:
        header("Location: auth/login.php");
}
exit;