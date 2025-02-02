<?php
session_start();
if (!isset($_SESSION['letter_id'])) {
    header("Location: download_letter.php");
    exit;
}
?>
<?php
include 'layout/header.php';
?>

<body>
<?php
    include 'connection.php';
    $id = $_SESSION['letter_id'];
    $sql = "Select * from joining_letter where id=$id";
    $data = mysqli_query($conn,$sql);
    if(mysqli_num_rows($data)>0){
        $result = mysqli_fetch_assoc($data);
    }
    ?>
    <div class="d-flex justify-content-center mb-2 ">
    <button id="btn-generate" class="text-uppercase" onclick="Convert_HTML_To_PDF();">print</button>
    </div>
    <div class="container" id="pdf-content">
        <img src="images/logo.png" alt="CCB Logo" class="logo">
        <div class="letter-content">
            <div class="from-content-header">
            <div class="from-content">
            <p>
                <strong>To:</strong> <?= $result['name']?><br>
                <?= $result['post']?><br>
                <?= $result['address']?>
            </p>
            </div>
            <div class=emp_id>
                <p><strong>Ref No:</strong> <?= $result['refno']?></p>
                <p><strong>Date:</strong><?= date('d M, Y',strtotime($result['date']))?></p>
             </div>
             </div>
            
            <h3>INVESTIGATION ACTIVITIES: LETTER OF INVITATION</h3>
            <h4>BREACH OF CODE OF CONDUCT FOR PUBLIC OFFICERS</h4>
            <p>The Bureau is investigating a case of alleged breach of the Code of Conduct for Public Officers against Mr. Ibrahim Mustapha Magu, former Acting Chairman of the Economic & Financial Crimes Commission (EFCC).</p>
            <p>You are invited for an interview scheduled as follows:</p>
            <ul>
                <li><strong>Date:</strong><?= date('D d M, Y',strtotime($result['int_date']))?></li>
                <li><strong>Time:</strong> <?= $result['time']?> Prompt</li>
                <li><strong>Venue:</strong> <?= $result['venue']?>.</li>
            </ul>
            <p>You are expected to come along with the following certified documents:</p>
            <ul>
                <li>Acknowledgment slips of all your Asset Declarations since joining public service.</li>
                <li>Copies of appointment letter, acceptance, records of service, and pay slips from January to May 2020.</li>
                <li>Title documents of your landed properties (both developed and undeveloped).</li>
                <li>All bank account statements from January 2015 to date.</li>
            </ul>
            <p>Treat as urgent, please.</p>
            <p class="sign"><strong>Signed,</strong><br>
                <strong>Gyimi S. Y.</strong><br>
                Director of Intelligence, Investigation & Monitoring<br>
                For: Chairman, CCB
            </p>
        </div>
        <div class="footer">
            <p>For more details, visit <a href="https://jagritinews.com/" target="_blank">© 2023 Reserved Jagriti News </a></p>
        </div>
    </div>
    
    <script
	src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
    window.jsPDF = window.jspdf.jsPDF;
    function Convert_HTML_To_PDF() {
        var doc = new jsPDF();
        var elementHTML = document.querySelector("#pdf-content");
        doc.html(elementHTML, {
            callback: function(doc) {
                doc.save('joining-letter.pdf');
            },
            margin: [10, 10, 10, 10],
            autoPaging: 'text',
            x: 0,
            y: 0,
            width: 190, // Target width in the PDF document
            windowWidth: 675 // Window width in CSS pixels
        });
    }
    </script>
    <!-- <script>
        var buttonElement = document.querySelector("#btn-generate");
        buttonElement.addEventListener('click', function() {
            var pdfContent = document.querySelector("#pdf-content");
            html2pdf().from(pdfContent).save('joining_letter');
        });
    </script> -->
</body>
</html>