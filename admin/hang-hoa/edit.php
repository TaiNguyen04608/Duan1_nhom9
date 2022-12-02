<?php
require "../../PDO/pdo.php";
require "../../PDO/hang-hoa.php";
require "../../PDO/loai.php";
$dslh = loai_selectall();
if (isset($_GET['ma_hh'])) {
    $ma_hh = $_GET['ma_hh'];
    $hh_info = hang_hoa_select_by_id($ma_hh);
    extract($hh_info);
}
if (isset($_POST['ten_hh'])) {
    $ma_loai = $_POST['loai_hang'];
    $ma_hh = $_POST['ma_hh'];
    $ten_hh = $_POST['ten_hh'];
    $don_gia = $_POST['don_gia'];
    $giam_gia = $_POST['giam_gia'];
    $loai_hang = $_POST['loai_hang'];
    $ngay = $_POST['ngay'];
    $hang_db = $_POST['hang_db'];
    $mo_ta = $_POST['mo_ta'];
    if ($_FILES['hinh']['name']) {
        $target = '../../images/' . basename($_FILES['hinh']['name']);
        move_uploaded_file($_FILES['hinh']['tmp_name'], $target);
    } else {
        $ma_hh = $_POST['ma_hh'];
        $hh_info = hang_hoa_select_by_id($ma_hh);
        extract($hh_info);
        $hinh = $hinh;
    }
    hang_hoa_update($ten_hh, $don_gia, $giam_gia, $hinh, $ngay, $mo_ta, $hang_db, $ma_loai, $ma_hh);

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
                                            Chỉnh sửa thông tin hàng hóa
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
                                                                            <label for="form_name">Tên hàng hóa<span style="color: red;">*</span></label>
                                                                            <input id="form_name" type="text" name="ten_hh" class="form-control" value="<?php echo $ten_hh ?>" placeholder="Giày" required="required" data-error="Cần phải có tên hàng hóa">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="form_lastname">Đơn giá<span style="color: red;">*</span></label>
                                                                            <input id="form_lastname" type="text" name="don_gia" class="form-control" value="<?php echo $don_gia ?>" placeholder="100" required="required" data-error="Lastname is required.">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="form_name">Giảm giá<span style="color: red;">*</span></label>
                                                                            <input id="form_name" type="text" name="giam_gia" value="<?php echo $giam_gia ?>" class="form-control" placeholder="0.2" required="required" data-error="Firstname is required.">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Loại hàng</label>
                                                                            <br>
                                                                            <select name="loai_hang" style="width: 55rem;padding: 1rem;" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                                                <option value="<?php echo $ma_loai ?>" selected>Chọn loại hàng</option>
                                                                                <?php
                                                                                foreach ($dslh as $lh) {
                                                                                    extract($lh);
                                                                                ?>
                                                                                    <option value="<?php echo $ma_loai ?>"><?php echo $ten_loai ?></option>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="form_lastname">Ngày nhập<span style="color: red;">*</span></label>
                                                                            <input id="form_lastname" type="date" value="<?php echo $ngay_nhap ?>" name="ngay" class="form-control" placeholder="2022-10-07">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <br>
                                                                    </div>
                                                                    <div class="col-md-6"><label>Hàng đặc biệt<span style="color: red;">*</span></label></div>
                                                                    <div class="col-md-6" style="display:flex;">
                                                                        <div class="form-check form-check-inline">
                                                                            <input name="hang_db" value="0" <?= !$kich_hoat ? "checked" : "" ?> class="form-check-input" type="radio" id="inlineRadio1">
                                                                            <label class="form-check-label" for="inlineRadio1">Đặc biệt</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline" style="margin-left: 1rem;">
                                                                            <input name="hang_db" value="1" <?= $kich_hoat ? "checked" : "" ?> class="form-check-input" type="radio" id="inlineRadio2">
                                                                            <label class="form-check-label" for="inlineRadio2">Bình thường</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="exampleFormControlFile1">Hình ảnh</label>
                                                                            <input type="file" name="hinh" class="form-control-file" id="exampleFormControlFile1">
                                                                            <img width="300" src="../../images/<?php echo $hinh ?>" class="img-thumbnail" alt="<?php echo $ten_hh ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label for="exampleFormControlTextarea1">Mô tả</label>
                                                                        <textarea name="mo_ta" class="form-control" id="exampleFormControlTextarea1" rows="4"><?php echo $mo_ta ?></textarea>
                                                                    </div>
                                                                    <br>
                                                                    <div class="col-md-12">
                                                                        <br>
                                                                    </div>
                                                                    <div class="col-md-12" style="display: flex;">
                                                                        <a href="list.php" class="btn btn-success btn-send  pt-2 btn-block">Hủy</a>
                                                                        <input type="hidden" name="ma_hh" value="<?= $ma_hh ?>">
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