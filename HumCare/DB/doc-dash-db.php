<?php
session_start();
require_once __DIR__ . '/../includes/db.php';

if(!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'doctor'){
    echo "Unauthorized";
    exit;
}

$id     = $_POST['id'] ?? '';
$status = $_POST['status'] ?? '';

$allowed = ['Pending','Confirmed','Completed','Cancelled'];

if(!in_array($status, $allowed)){
    echo "Invalid status";
    exit;
}

$stmt = mysqli_prepare($conn,
  "UPDATE appointments SET status=? WHERE id=?"
);
mysqli_stmt_bind_param($stmt, "si", $status, $id);

if(mysqli_stmt_execute($stmt)){
    echo "success";
}else{
    echo "Failed to update";
}