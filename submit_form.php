<?php
include 'connection.php';
if (!$conn) {
    echo json_encode(["status" => "error", "message" => "Database connection failed."]);
    exit;
}
$errors = [];
$name = mysqli_real_escape_string($conn, $_POST['name']);
$f_name = mysqli_real_escape_string($conn, $_POST['f_name']);
$dob = mysqli_real_escape_string($conn, $_POST['dob']);
$post = mysqli_real_escape_string($conn, $_POST['post']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$work_area = mysqli_real_escape_string($conn, $_POST['work_area']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$state = mysqli_real_escape_string($conn, $_POST['state']);
$district = mysqli_real_escape_string($conn, $_POST['district']);
$zip = mysqli_real_escape_string($conn, $_POST['zip']);
$aadhaar = mysqli_real_escape_string($conn, $_POST['aadhaar']);
$profile_image = mysqli_real_escape_string($conn, $_FILES['profile_image']['name']);
$payament_ss = mysqli_real_escape_string($conn, $_FILES['payament_ss']['name']);
$aadhaar_card_picture = mysqli_real_escape_string($conn, $_FILES['aadhaar_card_picture']['name']);


if (empty($name)) $errors['name'] = "Name is required.";
if (empty($f_name)) $errors['f_name'] = "Father name is required.";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = "Invalid email format.";
if (strlen($phone) < 10) $errors['phone'] = "Phone number must be at least 10 digits.";
if (empty($dob)) $errors['dob'] = "Date of birth is required.";
if (empty($post)) $errors['post'] = "Post is required.";
if (empty($work_area)) $errors['work_area'] = "Work Area is required.";
if (empty($address)) $errors['address'] = "Address is required.";
if (empty($state)) $errors['state'] = "State is required.";
if (empty($district)) $errors['district'] = "District is required.";
if (empty($zip)) $errors['zip'] = "Zip/Pin code is required.";
if (empty($aadhaar)) $errors['aadhaar'] = "Adhaar is required.";
if (empty($profile_image)) $errors['profile_image'] = "Profile image is required.";
if (empty($payament_ss)) $errors['payament_ss'] = "Payament ss is required.";
if (empty($aadhaar_card_picture)) $errors['aadhaar_card_picture'] = "Adhaar picture is required.";
if(!empty($profile_image)){
    $tmp_name = $_FILES['profile_image']['tmp_name'];
    move_uploaded_file($tmp_name,"profile/$profile_image");
}
if(!empty($payament_ss)){
    $tmp_name = $_FILES['payament_ss']['tmp_name'];
    move_uploaded_file($tmp_name,"payment_ss/$payament_ss");
}
if(!empty($aadhaar_card_picture)){
    $tmp_name = $_FILES['aadhaar_card_picture']['tmp_name'];
    move_uploaded_file($tmp_name,"adhaar/$aadhaar_card_picture");
}
if (!empty($errors)) {
    echo json_encode(["status" => "error", "errors" => $errors]);
    exit;
}

$sql = "INSERT INTO id_card (name, f_name,email, phone,dob,post,work_area,
address,state,district,pin,aadhaar,profile_image,payament_ss,
aadhaar_card_picture) 
        VALUES ('$name', '$f_name', '$email','$phone','$dob','$post', '$work_area',
        '$address','$state','$district','$zip','$aadhaar','$profile_image','$payament_ss',
        '$aadhaar_card_picture')";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["status" => "success", "message" => "Registration successful!"]);
} else {
    echo json_encode(["status" => "error", "message" => "Database error: " . mysqli_error($conn)]);
}
mysqli_close($conn);
?>
