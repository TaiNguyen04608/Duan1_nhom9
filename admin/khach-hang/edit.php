<?php
require "../../PDO/pdo.php";
require "../../PDO/khach-hang.php";
if (isset($_GET['ma_kh'])) {
    $ma_kh = $_GET['ma_kh'];
    $kh_info = khach_hang_select_by_id($ma_kh);
    extract($kh_info);
}
if (isset($_POST['ma_kh'])) {
    $tai_khoan = $_POST['tai_khoan'];
    $ma_kh = $_POST['ma_kh'];
    $mat_khau = $_POST['mat_khau'];
    $ho_ten = $_POST['ho_ten'];
    $email = $_POST['email'];
    $hinh = $_FILES['hinh']['name'];
    $vai_tro = $_POST['vai_tro'];
    $kich_hoat = $_POST['kich_hoat'];
    khach_hang_update($tai_khoan, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro, $ma_kh);
    // $r = khach_hang_update($ho_ten, );

    header("Location: list.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css
">
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.1.1.min.js">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    <title>YE Shop Admin</title>
</head>

<body>
    <nav class="mnb navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="ic fa fa-bars"></i>
                </button>
                <div style="padding: 15px 0;">
                    <!-- <a href="#" id="msbo"><i class="ic fa fa-bars"></i></a> -->
                </div>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Draude Oba <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Settings</a></li>
                            <li><a href="#">Upgrade</a></li>
                            <li><a href="#">Help</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-right">
                    <input type="text" class="form-control" placeholder="Search...">
                </form>
            </div>
        </div>
    </nav>
    <!--msb: main sidebar-->
    <?php
    require "../menu.php";
    ?>
    <!--main content wrapper-->
    <div class="mcw" style="margin-top: 4rem;">
        <div class="cv">
            <div>
                <div class="inbox">
                    <div class="inbox-bx container-fluid">
                        <div class="row" style="margin-left: 20rem;">
                            <div class="col-md-8">
                                <div class="container">
                                    <div class="text-lg-start" style="margin-left: 1rem;">
                                        <h1>
                                            Chỉnh sửa thông tin khách hàng
                                        </h1>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-7 mx-auto">
                                            <div class="card mt-2 mx-auto p-4 bg-light">
                                                <div class="card-body bg-light">
                                                    <div class="container">
                                                        <form action="edit.php" method="post" enctype="multipart/form-data" id="contact-form" role="form">
                                                            <div class="controls">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="form_name">Tài Khoản <span style="color: red;">*</span></label>
                                                                            <input id="form_name" type="text" name="tai_khoan" value="<?= $ma_kh ?>" class="form-control" placeholder="Tài khoản của bạn" required="required" data-error="Firstname is required.">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="form_lastname">Mật khẩu <span style="color: red;">*</span></label>
                                                                            <input id="form_lastname" type="password" name="mat_khau" value="<?= $mat_khau ?>" class="form-control" placeholder="Mật khẩu" required="required" data-error="Lastname is required.">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="form_name">Họ tên <span style="color: red;">*</span></label>
                                                                            <input id="form_name" type="text" name="ho_ten" value="<?= $ho_ten ?>" class="form-control" placeholder="Tên của bạn" required="required" data-error="Firstname is required.">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="form_email">Email <span style="color: red;">*</span></label>
                                                                            <input id="form_email" type="email" name="email" value="<?= $email ?>" class="form-control" placeholder="Địa chỉ email" required="required" data-error="Valid email is required.">
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="col-md-6"><label>Vai trò <span style="color: red;">*</span></label></div>
                                                                    <div class="col-md-6" style="display:flex;">
                                                                        <div class="form-check form-check-inline">
                                                                            <input name="vai_tro" value="0" <?= !$vai_tro ? "checked" : "" ?> class="form-check-input" type="radio" id="inlineRadio1">
                                                                            <label class="form-check-label" for="inlineRadio1">Khách hàng</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline" style="margin-left: 1rem;">
                                                                            <input name="vai_tro" value="1" <?= $vai_tro ? "checked" : "" ?> class="form-check-input" type="radio" id="inlineRadio2">
                                                                            <label class="form-check-label" for="inlineRadio2">Nhân viên</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6"><br></div>
                                                                    <div class="col-md-6"><label>Kích hoạt <span style="color: red;">*</span></label></div>
                                                                    <div class="col-md-6" style="display:flex;">
                                                                        <div class="form-check form-check-inline">
                                                                            <input name="kich_hoat" value="0" <?= !$kich_hoat ? "checked" : "" ?> class="form-check-input" type="radio" id="inlineRadio1">
                                                                            <label class="form-check-label" for="inlineRadio1">chưa kích hoạt</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline" style="margin-left: 1rem;">
                                                                            <input name="kich_hoat" value="1" <?= $kich_hoat ? "checked" : "" ?> class="form-check-input" type="radio" id="inlineRadio2">
                                                                            <label class="form-check-label" for="inlineRadio2">Kích hoạt</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="exampleFormControlFile1">Hình đại diện</label>
                                                                            <input type="file" name="hinh" class="form-control-file" id="exampleFormControlFile1">
                                                                            (<?= $hinh ?>)
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="display: flex;">
                                                                        <a href="list.php" class="btn btn-success btn-send  pt-2 btn-block">Hủy</a>
                                                                        <input type="hidden" name="ma_kh" value="<?= $ma_kh ?>">
                                                                        <input type="submit" style="margin: 0; margin-left: 1rem;" class="btn btn-success btn-send  pt-2 btn-block" value="Sửa">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.8 -->
                                        </div>
                                        <!-- /.row-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>