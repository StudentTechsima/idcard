<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: id.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            /* font-family: 'Noto Sans', sans-serif; */
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            /* font-family: 'Noto Sans Devanagari', sans-serif; */
            display: flex;
            justify-content: center;
            align-items: center;
            height:100vh;
        }
        .outer{
            width:400px;
           min-height:600px;
            border:5px solid #000; 
        }
        .inner{
            width:100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
        }
        .inner .logo{
            width:100px;
        }
        .inner .logo img{
            width:100%;
            height:100%;
        }
        .inner .text{
           width:100%;
           margin-left:35px;
        }
        .text h1{
            color:#0910be;
            font-size:45px;
            word-spacing: 10px;
        }
        .text h3{
            font-size:25px;
            word-spacing:12px;
            line-height: 27px;
        }
        
        .text .para1{
            font-size: 16px;
            font-weight: 600;
            color: #830c19;
            text-align: center;
        }
      .para{
        margin-top: -9px;
        font-size: 20px;
        font-weight: 600;
        color: #830c19;
        text-align: center;
        }
        .img-box{
            width: 150px;
            height: 180px;
            border: 5px solid red;
            background-color: aquamarine;
            border-radius: 20px;
            margin: 7px 121px;
        }
        h4{
            margin-left:90px;
        }
        ul li{
            list-style: none;
            margin:0px 40px;
            line-height: 28px;
            font-weight: 600;
        }
        .sign{
            display: flex;
        justify-content: space-around;
        margin: 20px 0px;
    }
    .sign p{
        font-size: 14px;
    font-weight: 600;
    }
    </style>
</head>
<body>
    <?php
    include 'connection.php';
    $id = $_SESSION['user_id'];
    $sql = "Select * from users where id=$id";
    $data = mysqli_query($conn,$sql);
    if(mysqli_num_rows($data)>0){
        $result = mysqli_fetch_assoc($data);
    }
    ?>
    <div class="outer" id="pdf-content">
        <div class="inner">
          <div class="logo">
             <img src="images/logo.png" alt="">
          </div>
          <div class="text">
            <h1>स्वास्थ विभाग</h1>
            <h3>उत्तर प्रदेश सरकार</h3>
            <p class="para1">अयोध्या मंडल,जनपद अयोध्या</p>
          </div>
          
        </div>
        <p class="para">कार्यालय : मुख्य चिकित्सा अधिकारी,अयोध्या</p>
          <div class="img-box"><img height="100%" width="100%" src="profile/<?= $result['profile_image']?>"></div>
          <h4>E.H.R.M.S. CODE :</h4>
          <ul>
            <li>नाम : <?= $result['name']?></li>
            <li>पदनाम : <?= $result['post']?></li>
            <li>जन्मतिथि : <?= $result['dob']?></li>
            <li>मोबाइल नं.: <?= $result['phone']?></li>
            <li>पता : <?= $result['address']?></li>
          </ul>
          <div class="sign">
            <p>मुख्य चिकित्साधिकारी </p>
            <p>उपमुख्य चिकित्साधिकारी </p>
          </div>
    </div>
    <button id="btn-generate">Download</button>
    <script
	src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
    var buttonElement = document.querySelector("#btn-generate");
    buttonElement.addEventListener('click', function() {
        var pdfContent = document.querySelector("#pdf-content");
        html2pdf().from(pdfContent).save('Id-Card');
    });
</script>
</body>
</html>