<?php
include 'layout/header.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    if($_GET['type']=="carddel"){
        $sql = "Delete from users where id=$id";
        if(mysqli_query($conn,$sql)){
            echo "<script>
                alert('Id Card Deleted.');
                window.location.href='idcard.php';
            </script>";
        }
    }elseif($_GET['type']=="cardapp"){
        $sql = "Update users set status='approved' where id=$id";
        if(mysqli_query($conn,$sql)){
            echo "<script>
                alert('Id Card Approved.');
                window.location.href='idcard.php';
            </script>";
        }
    }elseif($_GET['type']=="cardrej"){
        $sql = "Update users set status='rejected' where id=$id";
        if(mysqli_query($conn,$sql)){
            echo "<script>
                alert('Id Card Rejected.');
                window.location.href='idcard.php';
            </script>";
        }
    }elseif($_GET['type']=="joinrej"){
        $sql = "Update joining_letter set status='rejected' where id=$id";
        if(mysqli_query($conn,$sql)){
            echo "<script>
                alert('Joining Letter Rejected.');
                window.location.href='joining_letter.php';
            </script>";
        }
    }elseif($_GET['type']=="joinapp"){
        $sql = "Update joining_letter set status='approved' where id=$id";
        if(mysqli_query($conn,$sql)){
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