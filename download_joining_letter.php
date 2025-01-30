<?php
include 'connection.php';
session_start();
if (!$conn) {
    echo json_encode(["status" => "error", "message" => "Database connection failed."]);
    exit;
}
$refno = mysqli_real_escape_string($conn, $_POST['refno']);
if (empty($refno)) {
    echo json_encode(["status" => "error", "message" => "Both fields are required."]);
    exit;
}
$sql = "SELECT * FROM joining_letter WHERE refno = '$refno'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    $_SESSION['letter_id'] = $user['id'];
    echo json_encode(["status" => "success", "message" => "Your Joining Letter generated!"]);
} else {
    echo json_encode(["status" => "error", "message" => "User not found."]);
}
mysqli_close($conn);
?>
