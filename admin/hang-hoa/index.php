<?php
require "../../PDO/pdo.php";
require "../../PDO/loai.php";
require "../../PDO/hang-hoa.php";

$dslh = loai_selectall();

if (isset($_POST['ten_hh'])) {
    $ten_hh = $_POST['ten_hh'];
    (int)$don_gia = $_POST['don_gia'];
    $giam_gia = $_POST['giam_gia'];
    $loai_hang = $_POST['loai_hang'];
    $hinh = $_FILES['hinh']['name'];
    $ngay = $_POST['ngay'];
    $hang_db = $_POST['hang_db'];
    $mo_ta = $_POST['mo_ta'];
    $target = '../../images/' . basename($_FILES['hinh']['name']);
    if ((int)$don_gia > 0) {
        if ((int)$giam_gia > 0 && (int)$giam_gia < 1) {
            if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target)) {
                hang_hoa_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ngay, $mo_ta, (int)$hang_db, $loai_hang);
                // header("Location: index.php");
            } else {
                echo "Error";
            }
        } else {
            $MESSAGE = "Giảm giá phải từ 0 đến 1";
        }
    } else {
        $MESSAGE = "Đơn giá phải là số dương";
    }
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="http://code.jquery.com/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.1.1.min.js">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    <title>YE Shop Admin</title>
    <script>
        $().ready(function() {
            $("#hh_form").validate({
                onfocusout: true,
                onkeyup: false,
                onclick: false,
                rules: {
                    ten_hh: {
                        required: true,
                        maxlength: 15,
                        minlength: 8
                    },
                    don_gia: {
                        required: true,
                        number: true
                    },
                    giam_gia: {
                        // required: true,
                        number: true
                    },
                    ngay: {
                        required: true,
                    }
                },
                messages: {
                    ten_hh: {
                        required: "Bắt buộc nhập tài khoản",
                        maxlength: "Nhập tối đa 15 ký tự",
                        minlength: "Hãy nhập ít nhất 8 ký tự"
                    },
                    don_gia: {
                        required: "Bắt buộc nhập đơn giá",
                        number: "Giá phải là số dương"
                    },
                    giam_gia: {
                        // required: "Bắt buộc nhập đơn giá",
                        number: "Giảm giá là số từ 0 tới 1"
                    },
                    ngay: {
                        required: "Bắt buộc phải nhập ngày hiện tại hoặc trước đó",
                        // date: "Phải nhập đúng định dạng email"
                    }
                }
            });
        });
    </script>
    <style>
        .error {
            color: red;
            margin-top: 1rem;
        }
    </style>
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
                                    <div class="row ">
                                        <div class="col-lg-7 mx-auto">
                                            <div class="card mt-2 mx-auto p-4 bg-light">
                                                <div class="card-body bg-light">
                                                    <div class="container">
                                                        <div class=" text-center mt-5 ">
                                                            <h1>Hàng hóa</h1>
                                                        </div>
                                                        <div class="row ">
                                                            <div class="col-lg-7 mx-auto">
                                                                <div class="card mt-2 mx-auto p-4 bg-light">
                                                                    <div class="card-body bg-light">
                                                                        <div class="container">
                                                                            <form action="index.php" method="post" id="hh_form" enctype="multipart/form-data" name="hang_hoa_form" role="form">
                                                                                <div class="controls">
                                                                                    <h5 class="text-danger"><?php if (isset($MESSAGE) && (strlen($MESSAGE) > 0)) echo $MESSAGE ?></h5>
                                                                                    <div class="row">
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label for="form_name">Tên hàng hóa<span style="color: red;">*</span></label>
                                                                                                <input id="form_name" type="text" name="ten_hh" class="form-control" placeholder="Giày" required data-error="Cần phải có tên hàng hóa">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label for="form_lastname">Đơn giá<span style="color: red;">*</span></label>
                                                                                                <input id="form_lastname" type="text" name="don_gia" class="form-control" placeholder="100" required="required" data-error="Lastname is required.">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label for="form_name">Giảm giá<span style="color: red;">*</span></label>
                                                                                                <input id="form_giam_gia" type="text" name="giam_gia" class="form-control" placeholder="0.2" data-error="Firstname is required.">
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label class="mr-sm-2" for="inlineFormCustomSelect">Loại hàng</label>
                                                                                                <br>
                                                                                                <select name="loai_hang" style="width: 55rem;padding: 1rem;" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                                                                    <option selected>Chọn loại hàng</option>
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
                                                                                                <input id="form_ngay" type="date" name="ngay" class="form-control" placeholder="2022-10-07">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <br>
                                                                                        </div>
                                                                                        <div class="col-md-6"><label>Hàng đặc biệt<span style="color: red;">*</span></label></div>
                                                                                        <div class="col-md-6" style="display:flex;">
                                                                                            <div class="form-check form-check-inline">
                                                                                                <input name="hang_db" value="0" class="form-check-input" type="radio" id="inlineRadio1">
                                                                                                <label class="form-check-label" for="inlineRadio1">Đặc biệt</label>
                                                                                            </div>
                                                                                            <div class="form-check form-check-inline" style="margin-left: 1rem;">
                                                                                                <input name="hang_db" value="1" class="form-check-input" type="radio" id="inlineRadio2">
                                                                                                <label class="form-check-label" for="inlineRadio2">Bình thường</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="form-group">
                                                                                                <label for="exampleFormControlFile1">Hình ảnh</label>
                                                                                                <input type="file" name="hinh" class="form-control-file" id="exampleFormControlFile1">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12">
                                                                                            <label for="exampleFormControlTextarea1">Mô tả</label>
                                                                                            <textarea name="mo_ta" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="col-md-12">
                                                                                            <br>
                                                                                        </div>
                                                                                        <div class="col-md-12">
                                                                                            <input type="submit" class="btn btn-success btn-send  pt-2 btn-block" value="Thêm sản phẩm">
                                                                                            <a href="list.php" class="btn btn-success btn-send  pt-2 btn-block">Danh sách sản phẩm</a>
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