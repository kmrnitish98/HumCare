<?php
// SESSION CHECK
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'patient') {
    header("Location:../auth/login.php");
    exit;
}

// DB CONNECTION
$conn = mysqli_connect("localhost","root","","humcare");
if(!$conn){
    die("Database Connection Failed");
}

// CHECK DOCTOR ID FROM URL
if (!isset($_GET['doctor_id'])) {
    die("Doctor not selected");
}

$doctor_id = (int) $_GET['doctor_id'];

// SELECT DOCTOR DATA
$sql = "SELECT id, name, specialization, city 
        FROM doctors 
        WHERE id = $doctor_id";

$result = mysqli_query($conn, $sql);
$doctor = mysqli_fetch_assoc($result);
if (!$doctor) {
    die("Doctor not found");
}