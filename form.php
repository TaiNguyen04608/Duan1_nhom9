<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require "./global.php";
require "./PDO/pdo.php";
require "./PDO/khach-hang.php";

extract($_REQUEST);

if (exist_param("btn_login")) {
    $user = khach_hang_select_by_id($ma_kh);
    if ($user) {
        if ($user['mat_khau'] == $mat_khau) {
            $MESSAGE = "Đăng nhập thành công!";
            if (exist_param("ghi_nho")) {
                add_cookie("ma_kh", $ma_kh, 30);
                add_cookie("mat_khau", $mat_khau, 30);
            } else {
                delete_cookie("ma_kh");
                delete_cookie("mat_khau");
            }
            $_SESSION["user"] = $user;

            // Xử lý ghi nhớ tài khoản
            // Quay trở lại trang được yêu cầu
        } else {
            $MESSAGE = "Sai mật khẩu!";
        }
    } else {
        $MESSAGE = "Sai mã đăng nhập!";
    }
} else {
    if (exist_param("btn_logoff")) {
        session_unset();
    }
    $ma_kh = get_cookie("ma_kh");
    $mat_khau = get_cookie("mat_khau");
}
?>
<title>Đăng nhập</title>
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
<!-- Form-->
<?php
if (isset($_SESSION['user'])) {
    extract($_SESSION['user']);
?>

    <div class="container">
        <div class="main-body" style="margin-top: 20rem;">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div style="margin: 1rem;font-size: 2rem">
                            <a style="color: black;" href="index.php">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img style="border-radius:50%;width:300px;height:280px;border: solid 1px black;" src="./images/<?php echo $hinh ?>" alt="<?php echo $ho_ten ?>" class="rounded-circle">
                                <div class="mt-3">
                                    <h4><?php echo $ho_ten ?></h4>
                                    <!-- <p class="text-secondary mb-1">Full Stack Developer</p>
                                    <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p> -->
                                    <form action="form.php" method="post">
                                        <button name="btn_logoff" class="btn btn-primary">Đăng xuất</button>
                                        <?php
                                        if ($_SESSION['user']['vai_tro'] == TRUE) {
                                            echo "
                                        <a class='btn btn-primary' href='./admin/loai-hang/'>Admin</a>
                                        ";
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Tài khoản</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $ma_kh ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $email ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Họ tên</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $ho_ten ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info " href="./edit-user.php?ma_kh=<?php echo $ma_kh ?>">Chỉnh sửa</a>
                                    <a class="btn btn-info " href="./changepassword.php">Đổi mật khẩu</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
} else {
    $ma_kh = get_cookie("ma_kh");
    $mat_khau = get_cookie("mat_khau");
?>
    <div class="form">
        <div class="form-toggle"></div>
        <div class="form-panel-forgot one">
            <a href="index.php">
                <i style="font-size: x-large;color: #4bb543;" class="fa fa-arrow-left" aria-hidden="false"></i>
            </a>
            <div class="form-header">
                <h1>Đăng nhập</h1>
            </div>
            <div class="form-content">
                <form action="./form.php" id="form_register" method="post">
                    <div>
                        <h5 class="text-danger"><?php if (isset($MESSAGE) && (strlen($MESSAGE) > 0)) echo $MESSAGE ?></h5>
                    </div>
                    <div class="form-group">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" id="ma_kh" name="ma_kh" value="<?php echo $ma_kh ?>" required="required" />
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" id="mat_khau" name="mat_khau" value="<?php echo $mat_khau ?>" required="required" />
                    </div>
                    <div class="form-group">
                        <label class="form-remember">
                            <input name="ghi_nho" type="checkbox" checked />Ghi nhớ tài khoản ?
                        </label><a class="form-recovery" href="forgotpass.php">Quên mật khẩu ?</a>
                    </div>
                    <div class="form-group">
                        <button name="btn_login" type="submit">Đăng nhập</button>
                    </div>
                    <div class="form-group">
                        <a class="btn-link" href="registerform.php">Đăng ký</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>