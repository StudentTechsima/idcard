<?php
include 'layout/header.php';
$name = $email = $phone = $password = $confirm_password =$role= "";
$final = "";
$editing = false;
$user_id = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['signup']) || isset($_POST['update_user']))) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['pwd']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['c_pwd']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    if (empty($name) || empty($email) || empty($phone) ||empty($role) ||(isset($_POST['signup']) && (empty($password) || empty($confirm_password)))) {
        $final = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $final = "Invalid email format.";
    } elseif (isset($_POST['signup']) && $password != $confirm_password) {
        $final = "Passwords do not match.";
    } elseif (isset($_POST['update_user']) && $password != $confirm_password) {
        $final = "Passwords do not match.";
    } else {
        if (isset($_POST['signup'])) {
            $check_user = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
            if (mysqli_num_rows($check_user) > 0) {
                $final = "Email already registered.";
            } else {
                // $hashed_password = $password;
                $sql = "INSERT INTO users (name, email, password, phone, role) VALUES ('$name', '$email', '$password', '$phone', '$role')";
                if (mysqli_query($conn, $sql)) {
                    $final = "User created successfully!";
                    $name = $email = $phone = $password = $confirm_password = $role="";
                } else {
                    $final = "Error: " . mysqli_error($con);
                }
            }
        } elseif (isset($_POST['update_user'])) {
            $user_id = $_POST['user_id'];
            $check_user = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND id != '$user_id'");
            if (mysqli_num_rows($check_user) > 0) {
                $final = "Email already registered to another user.";
            } else {
                if (!empty($password)) {
                    // $hashed_password = $password;
                    $update_sql = "UPDATE users SET name='$name', email='$email', password='$password', phone='$phone' WHERE id='$user_id'";
                } else {
                    $update_sql = "UPDATE users SET name='$name', email='$email', phone='$phone',role='$role' WHERE id='$user_id'";
                }
                if (mysqli_query($conn, $update_sql)) {
                    $final = "User updated successfully!";
                    $name = $email = $phone = $password = $confirm_password = $role="";
                    $editing = false;
                } else {
                    $final = "Error updating user: " . mysqli_error($con);
                }
            }
        }
    }
}
if (isset($_POST['delete_user'])) {
    $user_id = $_POST['user_id'];
    $delete_sql = "DELETE FROM users WHERE id = '$user_id'";
    if (mysqli_query($conn, $delete_sql)) {
        $final = "User deleted successfully!";
    } else {
        $final = "Error deleting user: " . mysqli_error($con);
    }
}
if (isset($_GET['edit'])) {
    $user_id = $_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id='$user_id'");
    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $role = $row['role'];
        $editing = true;
    }
}
$users = mysqli_query($conn, "SELECT * FROM users");
?>
<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title"><?php echo $editing ? 'Update' : 'Create'; ?> User</h4>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <?= $editing ? '<a href="users.php" style="width:100px" class="btn btn-success">Add User</a>':''?>
                        <div class="col-lg-8 text-start">
                            <form class="auth-form login-form" action="" method="post">
                                <?php if (!empty($final)) { ?>
                                    <div class="alert alert-info">
                                        <?php echo $final; ?>
                                    </div>
                                <?php } ?>
                                <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">
                                <div class="email mb-3">
                                    <label class="" for="name">Name</label>
                                    <input id="name" name="name" type="text" class="form-control" placeholder="Your Name" value="<?php echo htmlspecialchars($name); ?>">
                                </div>
                                <div class="email mb-3">
                                    <label class="" for="email">Email</label>
                                    <input id="email" name="email" type="email" class="form-control" placeholder="Email address" value="<?php echo htmlspecialchars($email); ?>">
                                </div>
                                <div class="email mb-3">
                                    <label class="" for="location">Phone</label>
                                    <input id="phone" name="phone" type="text" class="form-control" placeholder="Your Location" value="<?php echo htmlspecialchars($phone); ?>">
                                </div>
                                <div class="password mb-3">
                                    <label class="" for="pwd">Password</label>
                                    <input id="pwd" name="pwd" type="password" class="form-control" placeholder="Password <?=  $editing ? '(leave blank if not changing)':'';?>">
                                </div>
                                <div class="password mb-3">
                                    <label class="" for="c_pwd">Confirm Password</label>
                                    <input id="c_pwd" name="c_pwd" type="password" class="form-control" placeholder="Confirm Password <?=  $editing ? '(leave blank if not changing)':''?>">
                                </div>
                                <div class="password mb-3">
                                    <label class="" for="c_pwd">User Role</label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="">--Select Role--</option>
                                        <option <?php echo $role=='admin'?'selected':''; ?> value="admin">Admin</option>
                                        <option <?php echo $role=='user'?'selected':''; ?> value="user">User</option>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="<?php echo $editing ? 'update_user' : 'signup'; ?>" class="btn btn-primary w-50 theme-btn mx-auto"><?php echo $editing ? 'Update User' : 'Add User'; ?></button>
                                </div>
                            </form>
                        </div>
                        <hr>
                        <div class="col-lg-2"></div>
                    </div>
                </div>     
                <div class="col-lg-12 tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_assoc($users)) { ?>
                                                <tr>
                                                    <td class="cell"><?php echo $row['id']; ?></td>
                                                    <td class="cell"><?php echo $row['name']; ?></td>
                                                    <td class="cell"><?php echo $row['email']; ?></td>
                                                    <td class="cell"><?php echo $row['phone']; ?></td>
                                                    <td class="cell"><?php echo $row['role']; ?></td>
                                                    <td class="cell">
                                                        <a href="?edit=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <form method="POST" action="" style="display:inline-block;">
                                                            <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                                                            <button type="submit" name="delete_user" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div><!--//auth-body-->
                            </div><!--//flex-column-->
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