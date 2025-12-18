<?php
require_once __DIR__ . '/../includes/db.php';
session_start();

// Get doctor ID from URL
$doctor_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch doctor details
$query = "SELECT * FROM doctors WHERE id = $doctor_id";
$result = mysqli_query($conn, $query);
$doctor = mysqli_fetch_assoc($result);

// Redirect if doctor doesn't exist
if (!$doctor) {
    header("Location: Doctors.php");
    exit;
}
?>