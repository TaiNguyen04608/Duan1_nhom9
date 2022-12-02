<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require "global.php";
require "./PDO/pdo.php";
require "./PDO/khach-hang.php";

if (isset($_GET['ma_kh'])) {
    $ma_kh = $_GET['ma_kh'];
    $kh_info = khach_hang_select_by_id($ma_kh);
    extract($kh_info);
}

if (isset($_POST['btn_edit'])) {
    $mat_khau = $_POST['mat_khau'];
    $ho_ten = $_POST['ho_ten'];
    $email = $_POST['email'];
    $hinh = $_FILES['image']['name'];
    if ($_FILES['image']['name']) {
        $target = './images/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    } else {
        $ma_kh = $_GET['ma_kh'];
        $kh = khach_hang_select_by_id($ma_kh);
        $hinh = $kh['hinh'];
        $kich_hoat = $kh['kich_hoat'];
        $vai_tro = $kh['vai_tro'];
    }
    try {
        khach_hang_update($_GET['ma_kh'], $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro, $_GET['ma_kh']);
        $MESSAGE = "Cập nhật thông tin thành viên thành công!";
        $_SESSION['user'] = khach_hang_select_by_id($ma_kh);
    } catch (Exception $exc) {
        $MESSAGE = "Cập nhật thông tin thành viên thất bại!";
    }
    header("Location: form.php");
}



?>
<link rel="stylesheet" href="./assets/css/form.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="http://code.jquery.com/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js" type="text/javascript"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<script src="./assets/js/form.js"></script>
<script>
    $().ready(function() {
        $("#form_register").validate({
            onfocusout: true,
            onkeyup: false,
            onclick: false,
            rules: {
                "mat_khau": {
                    required: true,
                    minlength: 8
                },
                "ho_ten": {
                    required: true,
                    minlength: 8
                },
                "email": {
                    require: true,
                    email: true
                }
            },
            messages: {
                "mat_khau": {
                    required: "Bắt buộc nhập password",
                    minlength: "Hãy nhập ít nhất 8 ký tự"
                },
                "ho_ten": {
                    required: "Mời bạn nhập họ tên",
                    minlength: "Hãy nhập ít nhất 8 ký tự"
                },
                "email": {
                    required: "Bắt buộc phải nhập email",
                    email: "Phải nhập đúng định dạng email"
                }
            }
        });
    });
</script>

<div class="form">
    <div class="form-toggle"></div>
    <div class="form-panel-forgot one">
        <a href="form.php">
            <i style="font-size: x-large;color: #4bb543;" class="fa fa-arrow-left" aria-hidden="false"></i>
        </a>
        <div class="form-header">
            <h1>Sửa thông tin cá nhân</h1>
            <div style="text-align: center;">
                <img style="border-radius:50%;width:120px;height:120px;border: solid 1px black;" src="./images/<?php echo $hinh ?>" alt="<?php echo $ho_ten ?>" class="rounded-circle">
                <p>Ảnh đại diện</p>
            </div>
        </div>
        <div class="form-content">
            <form method="post" action="edit-user.php?ma_kh=<?php echo $ma_kh ?>" id="form_register" enctype="multipart/form-data">
                <div>
                    <h5 class="text-danger"><?php if (isset($MESSAGE) && (strlen($MESSAGE) > 0)) echo $MESSAGE ?></h5>
                </div>
                <div class=" form-group">
                    <label for="tai_khoan">Tài khoản</label>
                    <input type="text" id="password" value="<?php echo $ma_kh ?>" readonly />
                </div>
                <div class=" form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" id="password" value="<?php echo $mat_khau ?>" name="mat_khau" required="required" />
                </div>
                <div class="form-group">
                    <label for="cpassword">Họ và tên</label>
                    <input type="text" id="cpassword" value="<?php echo $ho_ten ?>" name="ho_ten" required="required" />
                </div>
                <div class="form-group">
                    <label for="email">Địa chỉ email</label>
                    <input type="email" id="email" value="<?php echo $email ?>" name="email" required="required" />
                </div>
                <div class="form-group">
                    <label for="image">
                        Ảnh đại diện
                    </label>
                    <input type="file" id="image" name="image" />
                </div>
                <div class="form-group">
                    <button name="btn_edit" type="submit">Sửa</button>
                </div>
            </form>
        </div>
    </div>
</div>