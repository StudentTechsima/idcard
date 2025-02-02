<?php
include 'connection.php';
session_start();
if (!$conn) {
    echo json_encode(["status" => "error", "message" => "Database connection failed."]);
    exit;
}
$errors = [];
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = "Invalid email format.";
if (empty($password)) $errors['password'] = "Password is required.";
if (!empty($errors)) {
    echo json_encode(["status" => "error", "errors" => $errors]);
    exit;
}
$check=mysqli_query($conn,"select * from users where email='$email' and password='$password'");
if (mysqli_num_rows($check)>0)
{
    $user = mysqli_fetch_assoc($check);
    $_SESSION['email']=$email;
    $_SESSION['role']=$user['role'];
    $_SESSION['name']=$user['name'];
    $_SESSION['phone']=$user['phone'];
    echo json_encode(["status"=>"success"]);
}
else{
    echo json_encode(["status" => "fail", "errors" => "Invalid Users"]);
}
mysqli_close($conn);
?>
