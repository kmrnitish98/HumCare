<?php
require_once __DIR__ . '/../includes/db.php';

$role  = $_POST['role'] ?? '';
$name  = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$pass  = $_POST['password'] ?? '';
$spec  = $_POST['specialization'] ?? null;

/* VALIDATION */
if ($role === '' || $name === '' || $email === '' || $pass === '') {
    echo "All fields are required";
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
    exit;
}

if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/', $pass)) {
    echo "Weak password";
    exit;
}

if ($role === 'doctor' && empty($spec)) {
    echo "Specialization is required for doctors";
    exit;
}

/* CHECK DUPLICATE EMAIL */
$check = mysqli_prepare($conn, "SELECT id FROM users WHERE email=?");
mysqli_stmt_bind_param($check, "s", $email);
mysqli_stmt_execute($check);
mysqli_stmt_store_result($check);

if (mysqli_stmt_num_rows($check) > 0) {
    echo "Email already registered";
    exit;
}

/* INSERT USER */
$hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

$stmt = mysqli_prepare($conn,
    "INSERT INTO users (role, name, email, password, specialization)
     VALUES (?, ?, ?, ?, ?)"
);

mysqli_stmt_bind_param(
    $stmt,
    "sssss",
    $role,
    $name,
    $email,
    $hashedPassword,
    $spec
);

if (mysqli_stmt_execute($stmt)) {
    echo "success";
} else {
    echo mysqli_error($conn);
}