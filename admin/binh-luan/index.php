<?php
require "../../PDO/pdo.php";
require "../../PDO/thong_ke.php";
$tkbl = thong_ke_binh_luan();
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
        </div>
    </nav>
    <!--msb: main sidebar-->
    <?php
    require "../menu.php";
    ?>
    <!--main content wrapper-->
    <div class="mcw" style="margin-top: 6rem;">
        <div class="cv">
            <div>
                <div style="margin-left: 2rem" class="inbox">
                    <div class="inbox-sb">
                        <h1>Tổng hợp bình luận</h1>
                    </div>
                    <div class="inbox-bx container-fluid">
                        <div class="row">
                            <div class="col-md-10">
                                <table class="table table-stripped">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">HÀNG HÓA</th>
                                            <th scope="col">SỐ BÌNH LUẬN</th>
                                            <th scope="col">MỚI NHẤT</th>
                                            <th scope="col">CŨ NHẤT</th>
                                            <th scope="col">CHỨC NĂNG</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($tkbl as $bl) {
                                            extract($bl);
                                            $detail_link = "details.php?ma_hh=" . $ma_hh;
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" /></td>
                                                <th scope="row"><?php echo $ten_hh ?></th>
                                                <th scope="row"><?php echo $so_luong ?></th>
                                                <td scope="row"><?php echo $moi_nhat ?></td>
                                                <th scope="row"><?php echo $cu_nhat ?></th>
                                                <td>
                                                    <a href=" <?php echo $detail_link ?>" class="btn btn-info">Chi tiết</a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>