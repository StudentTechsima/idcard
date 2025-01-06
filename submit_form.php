<?php
include 'connection.php';
if (!$conn) {
    echo json_encode(["status" => "error", "message" => "Database connection failed."]);
    exit;
}
$errors = [];
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$dob = mysqli_real_escape_string($conn, $_POST['dob']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$blood = mysqli_real_escape_string($conn, $_POST['blood_group']);
$whatsapp = mysqli_real_escape_string($conn, $_POST['whatsapp']);
$nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$state = mysqli_real_escape_string($conn, $_POST['state']);
$district = mysqli_real_escape_string($conn, $_POST['district']);
$city = mysqli_real_escape_string($conn, $_POST['city']);
$zip = mysqli_real_escape_string($conn, $_POST['zip']);
$qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
$specialization = mysqli_real_escape_string($conn, $_POST['specialization']);
$profession = mysqli_real_escape_string($conn, $_POST['profession']);
$wings = mysqli_real_escape_string($conn, $_POST['wings']);
$join_as = mysqli_real_escape_string($conn, $_POST['join_as']);
$pharmacist_id = mysqli_real_escape_string($conn, $_POST['pharmacist_id']);
$profile_image = mysqli_real_escape_string($conn, $_FILES['profile_image']['name']);
$certificate = mysqli_real_escape_string($conn, $_FILES['certificate']['name']);
$member_fees = $_POST['member_fees'];
$expiry_date = date('Y-m-d', strtotime('+1 year'));

if (empty($firstname)) $errors['first-name'] = "First name is required.";
if (empty($lastname)) $errors['last-name'] = "Last name is required.";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = "Invalid email format.";
if (strlen($phone) < 10) $errors['phone'] = "Phone number must be at least 10 digits.";
if (empty($dob)) $errors['dob'] = "Date of birth is required.";
if (empty($gender)) $errors['gender'] = "Gender is required.";
if (empty($blood)) $errors['blood-group'] = "Blood Group is required.";
if (strlen($whatsapp) < 10) $errors['whatsapp'] = "Whatsapp number must be at least 10 digits.";
if (empty($nationality)) $errors['nationality'] = "Nationality is required.";
if (empty($address)) $errors['address'] = "Address is required.";
if (empty($state)) $errors['state'] = "State is required.";
if (empty($district)) $errors['district'] = "District is required.";
if (empty($city)) $errors['city'] = "City is required.";
if (empty($zip)) $errors['zip'] = "Zip/Pin code is required.";
if (empty($qualification)) $errors['qualification'] = "Qualification is required.";
if (empty($specialization)) $errors['specialization'] = "Specialization is required.";
if (empty($profession)) $errors['profession'] = "Profession is required.";
if (empty($wings)) $errors['wings'] = "Wings is required.";
if (empty($join_as)) $errors['join-as'] = "Join As is required.";
if (empty($pharmacist_id)) $errors['pharmacist-id'] = "Pharmacist Id is required.";
if (empty($profile_image)) $errors['profile-image'] = "Profile Image is required.";
if (empty($certificate)) $errors['certificate'] = "Certificate is required.";
if(!empty($profile_image)){
    $tmp_name = $_FILES['profile_image']['tmp_name'];
    move_uploaded_file($tmp_name,"profile/$profile_image");
}
if(!empty($certificate)){
    $tmp_name = $_FILES['certificate']['tmp_name'];
    move_uploaded_file($tmp_name,"certificate/$certificate");
}
if (!empty($errors)) {
    echo json_encode(["status" => "error", "errors" => $errors]);
    exit;
}

$sql = "INSERT INTO users (firstname, lastname, gender, dob,blood_group,email, phone,
whatsapp_number,nationality,address,state,district,city,pin,qualification,specialization,
profession,wings,join_as,reg_number,profile_image,certificate,member_fees,status,expiry_date) 
        VALUES ('$firstname', '$lastname', '$gender','$dob','$blood','$email', '$phone',
        '$whatsapp','$nationality','$address','$state','$district','$city','$zip','$qualification',
        '$specialization','$profession','$wings','$join_as','$pharmacist_id','$profile_image','$certificate',
        '$member_fees','enable','$expiry_date')";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["status" => "success", "message" => "Registration successful!"]);
} else {
    echo json_encode(["status" => "error", "message" => "Database error: " . mysqli_error($conn)]);
}
mysqli_close($conn);
?>
