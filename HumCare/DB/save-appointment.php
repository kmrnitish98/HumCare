<?php
session_start();
require_once __DIR__ . '/../includes/db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'patient') {
    header("Location: ../auth/login.php");
    exit;
}

$patient_id = (int) $_SESSION['user_id'];
$doctor_id  = isset($_POST['doctor_id']) ? (int) $_POST['doctor_id'] : 0;
$date       = $_POST['appointment_date'] ?? '';
$time       = $_POST['appointment_time'] ?? '';

if (!$doctor_id || !$date || !$time) {
    echo "<script>alert('Missing appointment data');history.back();</script>";
    exit;
}

// sanitize
$doctor_id = mysqli_real_escape_string($conn, $doctor_id);
$date = mysqli_real_escape_string($conn, $date);
$time = mysqli_real_escape_string($conn, $time);

/* PREVENT DUPLICATE SLOT */
$check_sql = "SELECT id FROM appointments
   WHERE doctor_id='$doctor_id'
   AND appointment_date='$date'
   AND appointment_time='$time'";
$check = mysqli_query($conn, $check_sql);

if ($check === false) {
    die('DB error: ' . mysqli_error($conn));
}

if (mysqli_num_rows($check) > 0) {
    echo "<script>alert('Time slot already booked');history.back();</script>";
    exit;
}

$insert_sql = "INSERT INTO appointments
(patient_id, doctor_id, appointment_date, appointment_time)
VALUES
('$patient_id','$doctor_id','$date','$time')";

if (!mysqli_query($conn, $insert_sql)) {
    // show error so it's clear why insert failed
    die('Insert failed: ' . mysqli_error($conn));
}

// Log the successful insertion and output insert id for debugging
$insert_id = mysqli_insert_id($conn);
$logdir = __DIR__ . '/../logs';
if (!is_dir($logdir)) {
    mkdir($logdir, 0755, true);
}
$logmsg = date('Y-m-d H:i:s') . " Inserted appointment: id={$insert_id} patient={$patient_id} doctor={$doctor_id} date={$date} time={$time}\n";
file_put_contents($logdir . '/appointments.log', $logmsg, FILE_APPEND);

/* Redirect back to patient dashboard; include insert id for verification */
header("Location: ../dashboard/Patient-Dash.php?booked=1&insert_id={$insert_id}");
exit;