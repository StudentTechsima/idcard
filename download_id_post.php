<?php
include 'connection.php';
session_start();
if (!$conn) {
    echo json_encode(["status" => "error", "message" => "Database connection failed."]);
    exit;
}
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$dob = mysqli_real_escape_string($conn, $_POST['dob']);
if (empty($phone) || empty($dob)) {
    echo json_encode(["status" => "error", "message" => "Both fields are required."]);
    exit;
}
$sql = "SELECT * FROM id_card WHERE phone = '$phone'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    if ($dob == $user['dob'] && $user['status']=='approved') {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        echo json_encode(["status" => "success", "message" => "Login successful!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Incorrect DOB or Your Id Card Not Approved."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "User not found."]);
}
mysqli_close($conn);
?>
