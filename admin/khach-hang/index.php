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
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.1.1.min.js">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    <script>
        $().ready(function() {
            $("#contact-form").validate({
                onfocusout: true,
                onkeyup: false,
                onclick: false,
                rules: {
                    "tai_khoan": {
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
                    "tai_khoan": {
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
        .error {
            color: red;
            margin-top: 1rem;
        }
    </style>
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
                                                            <h1>Khách hàng</h1>
                                                        </div>
                                                        <div class="row ">
                                                            <div class="col-lg-7 mx-auto">
                                                                <div class="card mt-2 mx-auto p-4 bg-light">
                                                                    <div class="card-body bg-light">
                                                                        <div class="container">
                                                                            <form action="execute.php" method="post" enctype="multipart/form-data" id="contact-form" role="form">
                                                                                <div class="controls">
                                                                                    <div class="row">
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label for="form_name">Tài Khoản <span style="color: red;">*</span></label>
                                                                                                <input id="form_name" type="text" name="tai_khoan" class="form-control" placeholder="Tài khoản của bạn" required="required" data-error="Firstname is required.">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label for="form_lastname">Mật khẩu <span style="color: red;">*</span></label>
                                                                                                <input id="form_lastname" type="password" name="mat_khau" class="form-control" placeholder="Mật khẩu" required="required" data-error="Lastname is required.">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label for="ho_ten">Họ tên <span style="color: red;">*</span></label>
                                                                                                <input id="form_name" type="text" name="ho_ten" class="form-control" placeholder="Tên của bạn" required="required" data-error="Firstname is required.">
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="form_email">Email <span style="color: red;">*</span></label>
                                                                                                <input id="form_email" type="email" name="email" class="form-control" placeholder="Địa chỉ email" required="required" data-error="Valid email is required.">
                                                                                            </div>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="col-md-6"><label>Vai trò <span style="color: red;">*</span></label></div>
                                                                                        <div class="col-md-6" style="display:flex;">
                                                                                            <div class="form-check form-check-inline">
                                                                                                <input name="vai_tro" value="0" class="form-check-input" type="radio" id="inlineRadio1">
                                                                                                <label class="form-check-label" for="inlineRadio1">Khách hàng</label>
                                                                                            </div>
                                                                                            <div class="form-check form-check-inline" style="margin-left: 1rem;">
                                                                                                <input name="vai_tro" value="1" class="form-check-input" type="radio" id="inlineRadio2">
                                                                                                <label class="form-check-label" for="inlineRadio2">Nhân viên</label>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6"><br></div>
                                                                                        <div class="col-md-6"><label>Kích hoạt <span style="color: red;">*</span></label></div>
                                                                                        <div class="col-md-6" style="display:flex;">
                                                                                            <div class="form-check form-check-inline">
                                                                                                <input name="kich_hoat" value="0" class="form-check-input" type="radio" id="inlineRadio1">
                                                                                                <label class="form-check-label" for="inlineRadio1">chưa kích hoạt</label>
                                                                                            </div>
                                                                                            <div class="form-check form-check-inline" style="margin-left: 1rem;">
                                                                                                <input name="kich_hoat" value="1" class="form-check-input" type="radio" id="inlineRadio2">
                                                                                                <label class="form-check-label" for="inlineRadio2">Kích hoạt</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="form-group">
                                                                                                <label for="exampleFormControlFile1">Hình đại diện</label>
                                                                                                <input type="file" name="hinh" class="form-control-file" id="exampleFormControlFile1">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12">
                                                                                            <input type="submit" class="btn btn-success btn-send  pt-2 btn-block" value="Tạo tài khoản">
                                                                                            <a href="list.php" class="btn btn-success btn-send  pt-2 btn-block">Danh sách khách hàng</a>
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