<?php
include 'connection.php';
if (!$conn) {
    echo json_encode(["status" => "error", "message" => "Database connection failed."]);
    exit;
}
$errors = [];
$name = mysqli_real_escape_string($conn, $_POST['name']);
$post = mysqli_real_escape_string($conn, $_POST['post']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$refno = mysqli_real_escape_string($conn, $_POST['refno']);
$date = mysqli_real_escape_string($conn, $_POST['date']);
$int_date = mysqli_real_escape_string($conn, $_POST['int_date']);
$time = mysqli_real_escape_string($conn, $_POST['time']);
$venue = mysqli_real_escape_string($conn, $_POST['venue']);

if (empty($name)) $errors['name'] = "Name is required.";
if (empty($post)) $errors['post'] = "Post is required.";
if (empty($address)) $errors['address'] = "Address is required.";
if (empty($refno)) $errors['refno'] = "Ref. No. is required.";
if (empty($date)) $errors['date'] = "Date is required.";
if (empty($int_date)) $errors['int_date'] = "Interview date is required";
if (empty($time)) $errors['time'] = "Time is required.";
if (empty($venue)) $errors['venue'] = "Venue is required.";
if (!empty($errors)) {
    echo json_encode(["status" => "error", "errors" => $errors]);
    exit;
}

$sql = "INSERT INTO joining_letter (name, post, address, refno,date,int_date, time,
venue) VALUES ('$name', '$post', '$address','$refno','$date','$int_date', '$time',
        '$venue')";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["status" => "success", "message" => "Registration successful!"]);
} else {
    echo json_encode(["status" => "error", "message" => "Database error: " . mysqli_error($conn)]);
}
mysqli_close($conn);
?>
