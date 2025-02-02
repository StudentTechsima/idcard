<?php
include 'layout/header.php';
?>
<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Dashboard</h4>
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-stats card-warning">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                    <i class="fa fa-id-card" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="col-7 d-flex align-items-center">
                                    
                                    <div class="numbers">
                                        <?php
                                        $sql = "select count(*) as idcard from users";
                                        $count = mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($count)>0){
                                            $idcard = mysqli_fetch_assoc($count);
                                            echo $idcard['idcard'];
                                        }
                                        ?>
                                        <p class="card-category">ID CARD</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-stats card-success">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="col-7 d-flex align-items-center">
                                    <div class="numbers">
                                    <?php
                                        $sql = "select count(*) as joinletter from joining_letter";
                                        $count = mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($count)>0){
                                            $join = mysqli_fetch_assoc($count);
                                            echo $join['joinletter'];
                                        }
                                        ?>
                                        <p class="card-category">JOINING LETTER</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>               
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container-fluid">
		<div class="copyright ml-auto">
        © 2023 Reserved Jagriti News <a
                href="https://jagritinews.com/">Techsima Solution Private Limited Ayodhya </a>
        </div>
    </div>
</footer>
</div>
</div>
</div>
<?php
include('layout/footer.php');
?>