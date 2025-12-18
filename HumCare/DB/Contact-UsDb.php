<?php
$conn=mysqli_connect("localhost","root","","humcare");

if(!$conn){
    die("Connection Failed..".mysqli_connect_error());
}

header('Content-Type: application/json');

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$msg = trim($_POST['message'] ?? '');

if($name=='' || $email=='' || $msg==''){
  echo json_encode([
    "status"=>"error",
    "msg"=>"All fields are required"
  ]);
  exit;
}

$stmt = mysqli_prepare(
  $conn,
  "INSERT INTO contact_messages (name,email,message) VALUES (?,?,?)"
);
mysqli_stmt_bind_param($stmt, "sss", $name, $email, $msg);
mysqli_stmt_execute($stmt);

echo json_encode([
  "status"=>"success"
]);