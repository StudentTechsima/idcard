<?php
include 'layout/header.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $str = substr($_GET['type'],0,1);
    if($str=='c'){
        $query = "Select * from id_card where id=$id";
    }else{
        $query = "Select * from joining_letter where id=$id";
    }
    $data = mysqli_query($conn,$query);
    $result = mysqli_fetch_assoc($data);
    $email = $result['email'];
    if($_GET['type']=="carddel"){
        $sql = "Delete from id_card where id=$id";
        if(mysqli_query($conn,$sql)){
            echo "<script>
                alert('Id Card Deleted.');
                window.location.href='idcard.php';
            </script>";
        }
    }elseif($_GET['type']=="cardapp"){
        $sql = "Update id_card set status='approved' where id=$id";
        if(mysqli_query($conn,$sql)){
            // $to = "gondtilak158@gmail.com";
            // $subject = "Test Mail";
            // $msg = "<h1>Your Id Card Approved</h1>";
            // $header = 'From: vishalgond235@gmail.com' . "\r\n" .
            //     'Content-type:text/html;charset=UTF-8'. "\r\n".
            //     'X-Mailer: PHP/' . phpversion();
            //     // mail(to,subject,message,header)
            // if(mail($to,$subject,$msg,$header)){
            //     echo "send";
            // }else{
            //     print_r( 'Mailer error: ' . error_get_last());
            // }
            echo "<script>
                alert('Id Card Approved.');
                window.location.href='idcard.php';
            </script>";
        }
    }elseif($_GET['type']=="cardrej"){
        $sql = "Update id_card set status='rejected' where id=$id";
        if(mysqli_query($conn,$sql)){
            // $to = "$email";
            // $subject = "Test Mail";
            // $msg = "<h1>Your Id Card Rejected</h1>";
            // $header = 'From: vishalgond235@gmail.com' . "\r\n" .
            //     'Content-type:text/html;charset=UTF-8'. "\r\n".
            //     'X-Mailer: PHP/' . phpversion();
            //     // mail(to,subject,message,header)
            // if(mail($to,$subject,$msg,$header)){
            //     echo "send";
            // }else{
            //     print_r( 'Mailer error: ' . error_get_last());
            // }
            echo "<script>
                alert('Id Card Rejected.');
                window.location.href='idcard.php';
            </script>";
        }
    }elseif($_GET['type']=="joinrej"){
        $sql = "Update joining_letter set status='rejected' where id=$id";
        if(mysqli_query($conn,$sql)){
            // $to = "$email";
            // $subject = "Test Mail";
            // $msg = "<h1>Your Joining Letter Rejected</h1>";
            // $header = 'From: vishalgond235@gmail.com' . "\r\n" .
            //     'Content-type:text/html;charset=UTF-8'. "\r\n".
            //     'X-Mailer: PHP/' . phpversion();
            //     // mail(to,subject,message,header)
            // if(mail($to,$subject,$msg,$header)){
            //     echo "send";
            // }else{
            //     print_r( 'Mailer error: ' . error_get_last());
            // }
            echo "<script>
                alert('Joining Letter Rejected.');
                window.location.href='joining_letter.php';
            </script>";
        }
    }elseif($_GET['type']=="joinapp"){
        $sql = "Update joining_letter set status='approved' where id=$id";
        if(mysqli_query($conn,$sql)){
            // $to = "$email";
            // $subject = "Test Mail";
            // $msg = "<h1>Your Joining Letter Approved</h1>";
            // $header = 'From: vishalgond235@gmail.com' . "\r\n" .
            //     'Content-type:text/html;charset=UTF-8'. "\r\n".
            //     'X-Mailer: PHP/' . phpversion();
            //     // mail(to,subject,message,header)
            // if(mail($to,$subject,$msg,$header)){
            //     echo "send";
            // }else{
            //     print_r( 'Mailer error: ' . error_get_last());
            // }
            echo "<script>
                alert('Joining Letter Approved.');
                window.location.href='joining_letter.php';
            </script>";
        }
    }elseif($_GET['type']=="joindel"){
        $sql = "Delete from joining_letter where id=$id";
        if(mysqli_query($conn,$sql)){
            echo "<script>
                alert('Joining Letter Deleted.');
                window.location.href='joining_letter.php';
            </script>";
        }
    }
}
?>