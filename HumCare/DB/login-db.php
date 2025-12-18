<?php
session_start();

$conn = mysqli_connect("localhost","root","","humcare");
if(!$conn){
    die("Connection Failed");
}

/* ================= INPUT ================= */
$email = trim($_POST['email'] ?? '');
$pass  = $_POST['password'] ?? '';
$role  = $_POST['role'] ?? '';

if ($email === '' || $pass === '') {
    echo "All fields required";
    exit;
}
include_once "adminHash.php";
/* ================= ADMIN LOGIN ================= */
if ($email === ADMIN_EMAIL && password_verify($pass, ADMIN_PASSWORD_HASH)) {

    $_SESSION['user_id']   = 0;
    $_SESSION['user_name'] = "Nitish";
    $_SESSION['role']      = "admin";

    echo "admin";
    exit;
}

/* ================= USER LOGIN ================= */
if ($role === '') {
    echo "Role required";
    exit;
}

$stmt = mysqli_prepare(
    $conn,
    "SELECT id, name, password FROM users WHERE email=? AND role=?"
);

mysqli_stmt_bind_param($stmt, "ss", $email, $role);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {

    if (password_verify($pass, $row['password'])) {

        $_SESSION['user_id']   = $row['id'];
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['role']      = $role;

        echo "success";

    } else {
        echo "Invalid password";
    }

} else {
    echo "Account not found";
}