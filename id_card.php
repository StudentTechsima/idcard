<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: id.php");
    exit;
}
?>
<?php
include 'layout/header.php';
?>
    <?php
    include 'connection.php';
    $id = $_SESSION['user_id'];
    $sql = "Select * from id_card where id=$id";
    $data = mysqli_query($conn,$sql);
    if(mysqli_num_rows($data)>0){
        $result = mysqli_fetch_assoc($data);
    }
    ?>
    <div class="d-flex justify-content-center mb-2 ">
        <button id="btn-generate"onclick="Convert_HTML_To_PDF();" class=" px-2 rounded"> Print</button>
    </div>
    <div class="outer" id="pdf-content">
        <div class="inner">
            <div class="logo">
                <img src="images/logo.png" alt="">
            </div>
            <div class="text">
                <h1>RNI No. DELHIN 13046/29/1/2005</h1>
            </div>
        </div>
        <div>
            <div class="img-box">
                <img src="profile/<?= $result['profile_image']?>">
            </div>
            <h4 class="details-heading">Details</h4>
            <ul>
                <li><span>Name :</span> <?= $result['name']?></li>
                <li><span>Desination :</span> <?= $result['post']?></li>
                <li><span>Date Of Birth :</span> <?= $result['dob']?></li>
                <li><span>Mobile:</span> <?= $result['phone']?></li>
                <li><span>Address :</span> <?= $result['address']?></li>
            </ul>
            <div class="sign">
                <p>Director</p>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
    var buttonElement = document.querySelector("#btn-generate");
    buttonElement.addEventListener('click', function() {
        var pdfContent = document.querySelector("#pdf-content");
        html2pdf().from(pdfContent).save('Id-Card');
    });
    </script>
</body>

</html>