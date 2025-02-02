<?php
session_start();
if(isset($_SESSION['role'])){
    header("Location:admin");
}
?>
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
<header class="container">
    <div class="form-header d-flex justify-content-between align-items-center">
        <div class="logo-agency mb-4">
            <img src="images/logo.png" alt="Logo" class="img-fluid mb-4" >
        </div>
        <div class="download-btn">
            <a  class="btn btn-outline-success text-uppercase me-3" href="download_id.php">Download Id Card</a>
            <a  class="btn btn-outline-success text-uppercase me-3" href="joining_letter_form.php">APPLY JOINING Letter</a>
            <a class="btn btn-outline-success text-uppercase" href="download_letter.php">Download Joining Letter</a>
        </div>       
    </div>                
</header>
    <div class="container p-5 bg-light rounded-3">    
        <div class="row" enctype="multipart/form-data">
        <h2 class="text-center text-uppercase bg-danger rounded-pill py-2 mb-3"><span class="text-white">Login</span><span  class="text-info">Form</span></h2>
        <form method="post" id="login_form">
            <div class="mb-3">
                <label for="address" class="form-label">User Name</label>
                <input type="text" id="email" name="email" class="form-control">
            </div> 
            <div class="mb-3">
                <label for="address" class="form-label">Password</label>
                <input type="text" id="password" name="password" class="form-control">
            </div>
            <div class="col-12">
                <button type="submit" id="butlogin" class="btn btn-success">Submit</button>
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
                url: 'login-post.php', 
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
                            $('form')[0].reset();
                            window.location.href="admin";
                        }else{
                            alert("Invalid User");
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