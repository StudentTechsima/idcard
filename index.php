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
            <div class="col-lg-12 form">
                <div class="logo-agency mb-4">
                    <img src="images/logo.png" alt="Logo" class="img-fluid mb-4" >
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Name*</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="f_name" class="form-label">Father's Name*</label>
                        <input type="text" id="f_name" name="f_name" class="form-control" >
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="dob" class="form-label">Date Of Birth*</label>
                        <input type="date" id="dob" name="dob" class="form-control" >
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="post" class="form-label">Post*</label>
                        <input type="text" id="post" name="post" class="form-control">
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="email" class="form-label">Email*</label>
                        <input type="email" id="email" name="email" class="form-control" >
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="phone" class="form-label">Mobile Number*</label>
                        <input type="text" id="phone" name="phone" class="form-control" >
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="nationality" class="form-label">Work Area*</label>
                        <input type="text" id="work_area" name="work_area" class="form-control" value="Indian">
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="address" class="form-label">Address*</label>
                        <textarea id="address" name="address" class="form-control" rows="3" ></textarea>
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="state" class="form-label">State*</label>
                        <select id="state" name="state" class="form-select form-control " >
                            <option value="">Select State</option>
                            <option value="up">Uttar pradesh</option>
                        </select>
                    </div>
                    <div class="col-md-6  mb-3">
                        <label for="district" class="form-label">District*</label>
                        <select id="district" name="district" class="form-select form-control" >
                            <option value="">Select District</option>
                            <option value="ayodhya">Ayodhya</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3 ">
                        <label for="zip" class="form-label">Pin/Zip Code*</label>
                        <input type="text" id="zip" name="zip" class="form-control" >
                    </div>
                   
                    <div class="col-md-6  mb-3">
                        <label for="aadhaar" class="form-label">Aadhaar Number*</label>
                        <input type="text" id="aadhaar" name="aadhaar" class="form-control" >
                    </div>              
                <div class="col-md-6  mb-3">
                    <label for="profile-image" class="form-label">Profile Picture* </label><span class="text-danger">(max size 50 KB -upload only .jpg)</span>
                    <input type="file" id="profile_image" name="profile_image" class="form-control" accept=".jpg"
                        >
                </div>
                <div class="col-md-6  mb-3">
                    <label for="payament_ss" class="form-label">Payment Screenshot* </label><span class="text-danger">(max size 100 KB - upload only .jpg)</span>
                    <input type="file" id="payament_ss" name="payament_ss" class="form-control" accept=".jpg" >
                </div>
                <div class="col-md-6  mb-3">
                    <label for="aadhaar_card_picture" class="form-label">Aadhaar Card Picture* </label><span class="text-danger">(max size 100 KB - upload only .jpg)</span>
                    <input type="file" id="aadhaar_card_picture" name="aadhaar_card_picture" class="form-control" accept=".jpg" >
                </div>
                <div class="payment-qr py-4">
                    <img src="" alt="payment qr">
                </div>
                <div class="col-12">
                        <button type="submit" class="btn btn-outline-success btn-lg">Submit</button>
                    </div>
                    
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