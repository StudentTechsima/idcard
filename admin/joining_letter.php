<?php
include 'layout/header.php';
?>
<div class="main-panel"    style="overflow:auto">
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Id Cards</h4>
            <div class="row overflow-outo">
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Post</th>
                        <th scope="col">Address</th>
                        <th scope="col">Refno. </th>
                        <th scope="col">Date</th>
                        <th scope="col">Interview Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Venue</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "Select * from joining_letter";
                        $data = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($data)>0){
                            while($row=mysqli_fetch_assoc($data)){
                        ?>
                        <tr>
                            <th scope="row"><?= $row['id']?></th>
                            <td><?= $row['name']?></td>
                            <td><?= $row['post']?></td>
                            <td><?= $row['address']?></td>
                            <td><?= $row['refno']?></td>
                            <td><?= $row['date']?></td>
                            <td><?= $row['int_date']?></td>
                            <td><?= $row['time']?></td>
                            <td><?= $row['venue']?></td>
                            <td><?= $row['status']?></td>
                            <td><?= $row['created_at']?></td>
                            <td class="d-flex">
                                <a href="action.php?type=joindel&id=<?= $row['id']?>">
                                    <i class="fa fa-trash text-danger p-1" style="font-size:20px"></i>
                                </a>
                                <?php if($row['status']=='pending'){?>
                                <a href="action.php?type=joinapp&id=<?= $row['id']?>">
                                    <i class="fa fa-check-circle text-success p-1" style="font-size:20px"></i>
                                </a>
                                <a href="action.php?type=joinrej&id=<?= $row['id']?>">
                                    <i class="fa fa-times-circle text-danger p-1" style="font-size:20px"></i>
                                </a>
                                <?php }?>
                            </td>
                        </tr>
                        <?php   
                            }
                        }
                        ?>
                    </tbody>
                </table>              
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