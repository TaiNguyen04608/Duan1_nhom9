<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require "./global.php";
require "./PDO/pdo.php";
require "./PDO/khach-hang.php";

extract($_REQUEST);
if (exist_param("btn_register")) {
    if (khach_hang_exist($ma_kh)) {
        $MESSAGE = "Tài khoản đã tồn tại";
    } else {
        $target = './images/' . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            khach_hang_insert($ma_kh, $mat_khau, $ho_ten, $email, $_FILES['image']['name'], $kich_hoat, $vai_tro);
            $MESSAGE = "Đăng ký tài khoản thành công";
            //     // header("Location: index.php");
        } else {
            $MESSAGE = "Đăng ký tài khoản thất bại";
        }
    }
}

?>

<link rel="stylesheet" href="./assets/css/form.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="http://code.jquery.com/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js" type="text/javascript"></script>
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
                },
                "image": {
                    require: true,
                }
            },
            messages: {
                "ma_kh": {
                    required: "Bắt buộc nhập tài khoản",
                    maxlength: "Nhập tối đa 15 ký tự",
                    minlength: "Hãy nhập ít nhất 8 ký tự"
                },
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
                },
                "image": {
                    required: "Chọn ảnh đại diện",
                }
            }
        });
    });
</script>
<style>
    body {
        margin-top: 20px;
        color: #1a202c;
        text-align: left;
        background-color: #e2e8f0;
    }

    .main-body {
        padding: 15px;
    }

    .card {
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }

    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
    }

    .gutters-sm {
        margin-right: -8px;
        margin-left: -8px;
    }

    .gutters-sm>.col,
    .gutters-sm>[class*=col-] {
        padding-right: 8px;
        padding-left: 8px;
    }

    .mb-3,
    .my-3 {
        margin-bottom: 1rem !important;
    }

    .bg-gray-300 {
        background-color: #e2e8f0;
    }

    .h-100 {
        height: 100% !important;
    }

    .shadow-none {
        box-shadow: none !important;
    }

    label.error {
        color: red;
        margin-top: 1rem;
    }
</style>
<div class="form">
    <div class="form-toggle"></div>
    <div class="form-panel-forgot one">
        <a href="form.php">
            <i style="font-size: x-large;color: #4bb543;" class="fa fa-arrow-left" aria-hidden="false"></i>
        </a>
        <div class="form-header">
            <h1>Đăng ký tài khoản</h1>
        </div>
        <div class="form-content">
            <form method="post" action="registerform.php" id="form_register" enctype="multipart/form-data">
                <div>
                    <h5 class="text-danger"><?php if (isset($MESSAGE) && (strlen($MESSAGE) > 0)) echo $MESSAGE ?></h5>
                </div>
                <div class="form-group">
                    <label for="username">Tên đăng nhập</label>
                    <input type="text" id="username" name="ma_kh" required="required" />
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" id="password" name="mat_khau" required="required" />
                </div>
                <div class="form-group">
                    <label for="cpassword">Họ và tên</label>
                    <input type="text" id="cpassword" name="ho_ten" required="required" />
                </div>
                <div class="form-group">
                    <label for="email">Địa chỉ email</label>
                    <input type="email" id="email" name="email" required="required" />
                </div>
                <div class="form-group">
                    <label for="image">
                        Ảnh đại diện
                    </label>
                    <input type="file" id="image" name="image" required="required" />
                </div>
                <div class="form-group">
                    <button name="btn_register" type="submit">Đăng ký</button>
                </div>
                <input type="hidden" name="vai_tro" value="0">
                <input type="hidden" name="kich_hoat" value="0">
            </form>
        </div>
    </div>
</div>