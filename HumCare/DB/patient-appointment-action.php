<?php
session_start();
require_once __DIR__ . '/../includes/db.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'patient') {
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit;
}

$action = $_POST['action'] ?? '';
$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
$patient_id = $_SESSION['user_id'];

if ($action !== 'cancel' || $id <= 0) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid parameters']);
    exit;
}

// Verify appointment belongs to patient
$check = mysqli_query($conn, "SELECT id FROM appointments WHERE id='$id' AND patient_id='$patient_id'");
if (mysqli_num_rows($check) == 0) {
    echo json_encode(['status' => 'error', 'message' => 'Appointment not found']);
    exit;
}

// Update status to Cancelled
$stmt = mysqli_prepare($conn, "UPDATE appointments SET status='Cancelled' WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
if (mysqli_stmt_execute($stmt)) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to cancel']);
}
