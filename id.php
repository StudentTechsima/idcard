<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Member ID Card</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-lg" style="max-width: 400px; width: 100%;">
            <div class="text-center mb-3">
                <img src="images/logo.png" alt="ABPA Logo" class="img-fluid mb-4" ">
               
                <h6 class="mb-3">Download Member ID Card</h6>
                <hr>
            </div>
            <form id="idCardForm">
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone No:</label>
                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter your phone number">
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Date Of Birth:</label>
                    <input type="date" id="dob" name="dob" class="form-control">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Download ID Card</button>
                </div>
            </form>
            <div id="message" class="mt-3"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.js"></script>
    <script>
        $(document).ready(function () {
            $('#idCardForm').submit(function (event) {
                event.preventDefault();
                $('#message').html('');
                $.ajax({
                    url: 'card.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function (response) {
                        try {
                            let result = JSON.parse(response);
                            if (result.status === "success") {
                                $('#message').html('<div class="alert alert-success">' + result.message + '</div>');
                                window.location.href = 'design.php';
                            } else {
                                $('#message').html('<div class="alert alert-danger">' + result.message + '</div>');
                            }
                        } catch (e) {
                            $('#message').html('<div class="alert alert-danger">Invalid server response.</div>');
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
