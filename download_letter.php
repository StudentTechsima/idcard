<?php
include 'layout/header.php';
?>
    <div class="container d-flex justify-content-center align-items-center py-5">
        <div class="card p-4 shadow-lg" style="max-width: 400px; width: 100%;">
            <div class="text-center mb-3">           
                <h6 class="mb-3 fs-3">Download Joining Letter</h6>
                <hr>
            </div>
            <form id="downloadLetterForm">
                <div class="mb-3">
                    <label for="phone" class="form-label">Ref. No:</label>
                    <input type="text" id="refno" name="refno" class="form-control"
                        placeholder="Enter your Ref No">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-success  text-uppercase">Download Now</button>
                </div>
            </form>
            <div id="message" class="mt-3"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.js"></script>
    <script>
    $(document).ready(function() {
        $('#downloadLetterForm').submit(function(event) {
            event.preventDefault();
            $('#message').html('');
            $.ajax({
                url: 'download_joining_letter.php',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    try {
                        let result = JSON.parse(response);
                        if (result.status === "success") {
                            $('#message').html('<div class="alert alert-success">' + result
                                .message + '</div>');
                            window.location.href = 'joining_letter.php';
                        } else {
                            $('#message').html('<div class="alert alert-danger">' + result
                                .message + '</div>');
                        }
                    } catch (e) {
                        $('#message').html(
                            '<div class="alert alert-danger">Invalid server response.</div>'
                            );
                    }
                }
            });
        });
    });
    </script>
</body>

</html>