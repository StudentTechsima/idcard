<?php
include 'layout/header.php';
?>
<div class="main-panel"   style="overflow:auto">
    <div class="content">
        <div class="container-fluid" >
            <h4 class="page-title">Id Cards</h4>
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Father Name</th>
                        <th scope="col">Date Of Birth</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Post</th>
                        <th scope="col">Work Area</th>
                        <th scope="col">Address</th>
                        <th scope="col">State</th>
                        <th scope="col">District</th>
                        <th scope="col">Pin</th>
                        <th scope="col">Adhaar</th>
                        <th scope="col">Profile</th>
                        <th scope="col">Payment SS</th>
                        <th scope="col">Adhaar Card</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "Select * from id_card";
                        $data = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($data)>0){
                            while($row=mysqli_fetch_assoc($data)){
                        ?>
                        <tr>
                            <th scope="row"><?= $row['id']?></th>
                            <td><?= $row['name']?></td>
                            <td><?= $row['f_name']?></td>
                            <td><?= $row['dob']?></td>
                            <td><?= $row['email']?></td>
                            <td><?= $row['phone']?></td>
                            <td><?= $row['post']?></td>
                            <td><?= $row['work_area']?></td>
                            <td><?= $row['address']?></td>
                            <td><?= $row['state']?></td>
                            <td><?= $row['district']?></td>
                            <td><?= $row['pin']?></td>
                            <td><?= $row['aadhaar']?></td>
                            <td><?= $row['profile_image']?></td>
                            <td><?= $row['payament_ss']?></td>
                            <td><?= $row['aadhaar_card_picture']?></td>
                            <td><?= $row['status']?></td>
                            <td><?= $row['created_at']?></td>
                            <td class="d-flex">
                                <a href="action.php?type=carddel&id=<?= $row['id']?>">
                                    <i class="fa fa-trash text-danger p-1" style="font-size:20px"></i>
                                </a>
                                <?php if($row['status']=='pending'){?>
                                <a href="action.php?type=cardapp&id=<?= $row['id']?>">
                                    <i class="fa fa-check-circle text-success p-1" style="font-size:20px"></i>
                                </a>
                                <a href="action.php?type=cardrej&id=<?= $row['id']?>">
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