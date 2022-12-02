<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require "./global.php";
require "./PDO/pdo.php";
require "./PDO/khach-hang.php";
extract($_REQUEST);


if (exist_param("btn_forgot")) {
    $user = khach_hang_select_by_id($ma_kh);
    if ($user) {
        if ($user['email'] != $email) {
            $MESSAGE = "Sai địa chỉ email";
        } else {
            $MESSAGE = "Mật khẩu của bạn là: " . $user['mat_khau'];
        }
    } else {
        $MESSAGE = "Sai tên đăng nhập";
    }
}
?>

<title>Phục hồi mật khẩu</title>
<link rel="stylesheet" href="./assets/css/form.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<script src="http://code.jquery.com/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js" type="text/javascript"></script>
<!-- <script src="./assets/js/form.js"></script> -->
<script>
    $().ready(function() {
        $("#form_register").validate({
            onfocusout: true,
            onkeyup: false,
            onclick: false,
            rules: {
                "ma_kh": {
                    required: true,
                    maxlength: 15,
                    minlength: 8
                },
                "email": {
                    require: true,
                    email: true
                }
            },
            messages: {
                "ma_kh": {
                    required: "Bắt buộc nhập tài khoản",
                    maxlength: "Nhập tối đa 15 ký tự",
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
<style>
    label.error {
        color: red;
        margin-top: 1rem;
    }
</style>
<!-- Form-->
<div class="form">
    <div class="form-toggle"></div>
    <div class="form-panel-forgot one">
        <a href="form.php">
            <i style="font-size: x-large;color: #4bb543;" class="fa fa-arrow-left" aria-hidden="false"></i>
        </a>
        <div class="form-header">
            <h1>Quên mật khẩu</h1>
        </div>
        <div class="form-content">
            <form action="forgotpass.php" id="form_register" method="post">
                <div>
                    <h5 class="<?php echo $user['email'] == $email ? "text-success" : "text-danger" ?>"><?php if (isset($MESSAGE) && (strlen($MESSAGE) > 0)) echo $MESSAGE ?></h5>
                </div>
                <div class="form-group">
                    <label for="username">Tài khoản </label>
                    <input type="text" id="ma_kh" name="ma_kh" required="required" />
                </div>
                <div class="form-group">
                    <label for="password">Email</label>
                    <input type="email" id="email" name="email" required="required" />
                </div>
                <div class="form-group">
                    <button name="btn_forgot">Tìm mật khẩu</button>
                </div>
            </form>
        </div>
    </div>
</div>