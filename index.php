<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABPA Member Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="bg-white">
    <div class="container py-5"> 
        <form class="row" enctype="multipart/form-data">
            <div class="col-lg-9 form">
                <div class=" mb-4">
                    <img src="images/logo.png" alt="ABPA Logo" class="img-fluid mb-4" width="300" >
                    <h1 class="h3 mt-3 mb-0">ABPA Member Registration - Join Now</h1>
                    <hr class="m-0  text-secondary">
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="first-name" class="form-label">First Name*</label>
                        <input type="text" id="first-name" name="firstname" class="form-control">
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="last-name" class="form-label">Last Name*</label>
                        <input type="text" id="last-name" name="lastname" class="form-control" >
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="gender" class="form-label">Gender*</label>
                        <select id="gender" name="gender" class="form-select" >
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="dob" class="form-label">DOB*</label>
                        <input type="date" id="dob" name="dob" class="form-control" >
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="blood-group" class="form-label">Blood Group</label>
                        <input type="text" id="blood-group" name="blood_group" class="form-control">
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="email" class="form-label">Email*</label>
                        <input type="email" id="email" name="email" class="form-control" >
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="phone" class="form-label">Phone*</label>
                        <input type="text" id="phone" name="phone" class="form-control" >
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="whatsapp" class="form-label">WhatsApp Number</label>
                        <input type="text" id="whatsapp" name="whatsapp" class="form-control">
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="nationality" class="form-label">Nationality</label>
                        <input type="text" id="nationality" name="nationality" class="form-control" value="Indian">
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="address" class="form-label">Address*</label>
                        <textarea id="address" name="address" class="form-control" rows="3" ></textarea>
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="state" class="form-label">State*</label>
                        <select id="state" name="state" class="form-select" >
                            <option value="">Select State</option>
                            <option value="up">Uttar pradesh</option>
                        </select>
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="district" class="form-label">District*</label>
                        <select id="district" name="district" class="form-select" >
                            <option value="">Select District</option>
                            <option value="ayodhya">Ayodhya</option>
                        </select>
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" id="city" name="city" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3 ">
                        <label for="zip" class="form-label">Pin/Zip Code*</label>
                        <input type="text" id="zip" name="zip" class="form-control" >
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="qualification" class="form-label">Qualification*</label>
                        <select id="qualification" name="qualification" class="form-select" >
                            <option value="">Select Qualification</option>
                            <option value="12th">12th</option>
                        </select>
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="specialization" class="form-label">Specialization*</label>
                        <input type="text" id="specialization" name="specialization" class="form-control" >
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="profession" class="form-label">Profession*</label>
                        <select id="profession" name="profession" class="form-select" >
                            <option value="">Select Profession</option>
                            <option value="pharmasist">Pharmasist</option>
                        </select>
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="wings" class="form-label">Wings*</label>
                        <select id="wings" name="wings" class="form-select" >
                            <option value="">Select Wings</option>
                            <option value="test">Test wings</option>
                        </select>
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="join-as" class="form-label">Join As*</label>
                        <select id="join-as" name="join_as" class="form-select" >
                            <option value="">Select Join As</option>
                            <option value="pharma">Pharma</option>
                        </select>
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="pharmacist-id" class="form-label">Registered Pharmacist Number or Student
                            ID*</label>
                        <input type="text" id="pharmacist-id" name="pharmacist_id" class="form-control" >
                    </div>
                </div>
                <div class="col-12  mb-3">
                    <label for="profile-image" class="form-label">Profile Image* </label><span class="text-danger">(max size 50 KB -upload only .jpg)</span>
                    <input type="file" id="profile-image" name="profile_image" class="form-control" accept=".jpg"
                        >
                </div>
                <div class="col-12  mb-3">
                    <label for="certificate" class="form-label">Registered Pharmacist Certificate or Student
                        Certificate* </label><span class="text-danger">(max size 100 KB - upload only .jpg)</span>
                    <input type="file" id="certificate" name="certificate" class="form-control" accept=".jpg" >
                </div>
                <div class="col-md-6  mb-3">
                    <label for="member-fees " class="form-label">Member Fees*</label><span class="text-danger">(Rs. 551/- for One Year)</span>
                    <input type="text" id="member-fees" name="member_fees" class="form-control" readonly value="551">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success">Pay Now</button>
                </div>
                </div>
                <div class="col-lg-3">
                    <div class=" text-start">
                        <h3 class="mb-2">Membership Fee: Rs. 551/- only for One Year</h3>
                        <img src="images/razorpay_logo.jpg" alt="Pay Online via Razorpay" class="img-fluid">
                    </div>
                </div>
        </form>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.js"></script>
    <script>
    $(document).ready(function () {
        $('form').submit(function (event) {
            event.preventDefault();
            $('.error-message').remove();
            $('input, select, textarea').removeClass('is-invalid');
            let formData = new FormData(this);
            $.ajax({
                url: 'submit_form.php', 
                type: 'POST',
                data: formData,
                contentType: false, 
                processData: false, 
                success: function (response) {
                    try {
                        let result = JSON.parse(response);
                        if (result.status == "error") {
                            Object.keys(result.errors).forEach(function (key) {
                                $('#' + key).addClass('is-invalid');
                                $('#' + key).after('<div class="error-message text-danger">' + result.errors[key] + '</div>');
                            });
                        } else if (result.status == "success") {
                            alert(result.message);
                            $('form')[0].reset();
                        }
                    } catch (e) {
                        alert(response)
                        alert('Unexpected response from server.');
                    }
                },
                error: function () {
                    alert('Something went wrong!');
                }
            });
        });
    });
    </script>
</body>
</html>