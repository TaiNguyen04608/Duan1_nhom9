<?php
require "../../PDO/pdo.php";
require "../../PDO/loai.php";
if (isset($_POST['ten_loai'])) {
    $ten_loai = $_POST['ten_loai'];
    if (loai_exist($ten_loai)) {
        $MESSAGE = "Tên loại không được trùng";
    } else {
        loai_insert($ten_loai);
        $MESSAGE = "Thêm loại thành công";
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
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.1.1.min.js">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    <script>
        $().ready(function() {
            $("#contact-form").validate({
                onfocusout: true,
                onkeyup: false,
                onclick: false,
                rules: {
                    "ma_loai": {
                        required: true,
                    }
                },
                messages: {
                    "ma_loai": {
                        required: "Bắt buộc nhập loại",
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
                                    <div class=" text-center mt-5 ">
                                        <h1>Thêm loại</h1>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-7 mx-auto">
                                            <div class="card mt-2 mx-auto p-4 bg-light">
                                                <div class="card-body bg-light">
                                                    <div class="container">
                                                        <form id="contact-form" action="index.php" method="post" role="form">
                                                            <div class="controls">
                                                                <h5 class="text-danger"><?php if (isset($MESSAGE) && (strlen($MESSAGE) > 0)) echo $MESSAGE ?></h5>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="form_message">Tên loại <span style="color: red;">*</span></label>
                                                                            <input id="form_message" name="ten_loai" class="form-control" placeholder="Điền tên loại" required="required" data-error="Chưa điền tên loại" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <input type="submit" class="btn btn-success btn-send  pt-2 btn-block" value="Thêm">
                                                                        <a href="list.php" class="btn btn-success btn-send  pt-2 btn-block">Danh sách</a>
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