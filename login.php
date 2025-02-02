<?php
session_start();
if(isset($_SESSION['role'])){
    header("Location:admin");
}
?>
<?php
include 'layout/header.php';
?>
    <div class="container  ">    
        <div class="row">
            <div class="col-lg-6 bg-light mx-auto rounded-3  p-5">
            <h2 class="text-center text-uppercase bg-danger rounded-pill py-2 mb-3"><span class="text-white">Login</span><span  class="text-info">Form</span></h2>
        <form method="post" id="login_form" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="address" class="form-label">User Name</label>
                <input type="text" id="email" name="email" class="form-control">
            </div> 
            <div class="mb-3">
                <label for="address" class="form-label">Password</label>
                <input type="text" id="password" name="password" class="form-control">
            </div>
            <div class="col-12">
                <button type="submit" id="butlogin" class="btn btn-success text-uppercase">Login Now</button>
            </div>
        </form>
            </div>
        
    </div>
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