<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require "global.php";
require "./PDO/pdo.php";
require "./PDO/khach-hang.php";
extract($_REQUEST);

if (exist_param("btn_change")) {
    if ($mat_khau2 != $mat_khau3) {
        $MESSAGE = "Xác nhận mật khẩu mới không đúng!";
    } else {
        $user = khach_hang_select_by_id($ma_kh);
        if ($user) {
            if ($user['mat_khau'] == $mat_khau) {
                try {
                    khach_hang_change_password($ma_kh, $mat_khau2);
                    $MESSAGE = "Đổi mật khẩu thành công!";
                } catch (Exception $exc) {
                    $MESSAGE = "Đổi mật khẩu thất bại !";
                }
            } else {
                $MESSAGE = "Sai mật khẩu!";
            }
        } else {
            $MESSAGE = "Sai mã đăng nhập!";
        }
    }
}

?>
<link rel="stylesheet" href="./assets/css/form.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="http://code.jquery.com/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js" type="text/javascript"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<style>
    label.error {
        color: red;
        margin-top: 1rem;
    }
</style>
<script>
    $().ready(function() {
        $("#form_register").validate({
            onfocusout: true,
            onkeyup: false,
            onclick: false,
            rules: {
                "ma_kh": {
                    required: true,
                },
                "mat_khau": {
                    required: true,
                },
                "mat_khau2": {
                    required: true,
                },
                "mat_khau3": {
                    required: true,
                }
            },
            messages: {
                "ma_kh": {
                    required: "Bắt buộc nhập tài khoản",
                },
                "mat_khau": {
                    required: "Bắt buộc nhập mật khẩu  cũ",
                },
                "mat_khau2": {
                    required: "Bắt buộc nhập mật khẩu mới",
                },
                "mat_khau3": {
                    required: "Bắt buộc phải nhập xác nhận mật khẩu",
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
            <h1>Đổi mật khẩu</h1>
        </div>
        <div class="form-content">
            <form method="post" action="changepassword.php" id="form_register" enctype="multipart/form-data">
                <div>
                    <h5 class="<?php echo $MESSAGE == "Đổi mật khẩu thành công!" ? "text-success" : "text-danger" ?>"><?php if (isset($MESSAGE) && (strlen($MESSAGE) > 0)) echo $MESSAGE ?></h5>
                </div>
                <div class=" form-group">
                    <label for="tai_khoan">Tài khoản</label>
                    <input type="text" name="ma_kh" />
                </div>
                <div class=" form-group">
                    <label for="password">Mật khẩu cũ</label>
                    <input type="password" id="password" name="mat_khau" />
                </div>
                <div class="form-group">
                    <label for="cpassword">Mật khẩu mới</label>
                    <input type="text" id="cpassword" name="mat_khau2" />
                </div>
                <div class="form-group">
                    <label for="email">Xác nhận mật khẩu mới</label>
                    <input type="text" id="email" name="mat_khau3" />
                </div>
                <div class="form-group">
                    <button name="btn_change">Đổi mật khẩu</button>
                </div>
            </form>
        </div>
    </div>
</div>