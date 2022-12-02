<?php
require "../../PDO/pdo.php";
require "../../PDO/loai.php";
if (isset($_GET['ma_loai'])) {
    $ma_loai = $_GET['ma_loai'];
    $loai_info = loai_query_one($ma_loai);
    extract($loai_info);
}
if (isset($_POST['ma_loai'])) {
    loai_update($_POST['ma_loai'], $_POST['ten_loai']);
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
                                    <div class="text-lg-start" style="margin-left: 1rem;">
                                        <h1>
                                            Chỉnh sửa
                                        </h1>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-7 mx-auto">
                                            <div class="card mt-2 mx-auto p-4 bg-light">
                                                <div class="card-body bg-light">
                                                    <div class="container">
                                                        <form id="contact-form" action="edit.php" method="post" role="form">
                                                            <div class="controls">
                                                                <div class="row">
                                                                    <div class="col-md-10">
                                                                        <div class="form-group">
                                                                            <label for="form_message">Tên loại <span style="color: red;">*</span></label>
                                                                            <input id="form_message" name="ten_loai" class="form-control" value="<?= $ten_loai ?>" placeholder="Điền tên loại" required="required" data-error="Chưa điền tên loại" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-10" style="display: flex;">
                                                                        <a href="list.php" class="btn btn-success btn-send  pt-2 btn-block">Hủy</a>
                                                                        <input type="hidden" name="ma_loai" value="<?= $ma_loai ?>">
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