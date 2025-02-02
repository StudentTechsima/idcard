<?php
include 'layout/header.php';
?>

<div class="container p-5 bg-light rounded-3">
    <form class="row form" enctype="multipart/form-data">
        <h2 class="text-center text-uppercase bg-danger rounded-pill py-2 mb-3"><span
                class="text-white">Apply</span><span class="text-info"> Joining Letter</span></h2>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="address" class="form-label">Name*</label>
                    <input type="text" id="name" name="name" class="form-control">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="address" class="form-label">Post*</label>
                    <textarea id="post" id="post" name="post" class="form-control" rows="3"></textarea>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="address" class="form-label">Address*</label>
                    <textarea id="address" name="address" class="form-control" rows="3"></textarea>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="address" class="form-label">Ref No.*</label>
                    <input type="text" id="refno" name="refno" class="form-control">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="address" class="form-label">Date*</label>
                    <input type="date" id="date" class="form-control" name="date">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="address" class="form-label">Interview Date*</label>
                    <input type="date" id="int_date" class="form-control" name="int_date">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="address" class="form-label">Time*</label>
                    <input type="time" id="time" class="form-control" name="time">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="address" class="form-label">Venue*</label>
                    <textarea id="venue" id="venue" name="venue" class="form-control" rows="3"></textarea>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success px-4 text-uppercase">Apply Now</button>
            </div>
        </form>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/jquery.js"></script>
<script>
$(document).ready(function() {
    $('form').submit(function(event) {
        event.preventDefault();
        $('.error-message').remove();
        $('input, select, textarea').removeClass('is-invalid');
        let formData = new FormData(this);
        $.ajax({
            url: 'submit_joining_letter.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                try {
                    let result = JSON.parse(response);
                    if (result.status == "error") {
                        Object.keys(result.errors).forEach(function(key) {
                            $('#' + key).addClass('is-invalid');
                            $('#' + key).after(
                                '<div class="error-message text-danger">' +
                                result.errors[key] + '</div>');
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
            error: function() {
                alert('Something went wrong!');
            }
        });
    });
});
</script>
</body>

</html>