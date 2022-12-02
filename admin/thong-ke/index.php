<?php
require "../../PDO/pdo.php";
require "../../PDO/thong_ke.php";
$tkhh = thong_ke_hang_hoa();
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
                        <h1>Danh sách thống kê</h1>
                    </div>
                    <div class="inbox-bx container-fluid">
                        <div class="row">
                            <div class="col-md-10">
                                <table class="table table-stripped">
                                    <thead>
                                        <tr>
                                            <th scope="col">LOẠI HÀNG</th>
                                            <th scope="col">GIÁ CAO NHẤT</th>
                                            <th scope="col">GIÁ THẤP NHẤT</th>
                                            <th scope="col">GIÁ TRUNG BÌNH</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($tkhh as $hh) {
                                            extract($hh);
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $ten_loai ?></th>
                                                <td scope="row">$<?php echo number_format($gia_max, 2) ?></td>
                                                <td scope="row">$<?php echo number_format($gia_min, 2) ?></td>
                                                <td scope="row">$<?php echo number_format($gia_avg, 2) ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <div>
                                    <a href="thongke.php" class="btn btn-info">Thống kê</a>
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