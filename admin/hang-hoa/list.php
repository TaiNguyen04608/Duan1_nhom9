<?php
require "../../PDO/pdo.php";
require "../../PDO/hang-hoa.php";
$dshh = hang_hoa_select_all();
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
    <div class="mcw" style="margin-top: 6rem;">
        <div class="cv">
            <div>
                <div style="margin-left: 2rem" class="inbox">
                    <div class="inbox-sb">
                        <h1><a style="color: black;margin-right: 2rem;" href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>Danh sách hàng hóa</h1>
                    </div>
                    <div class="inbox-bx container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-stripped">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">MÃ HÀNG HÓA</th>
                                            <th scope="col">HÌNH</th>
                                            <th scope="col">TÊN HÀNG HÓA</th>
                                            <th scope="col">ĐƠN GIÁ</th>
                                            <th scope="col">GIẢM GIÁ</th>
                                            <th scope="col" style="width:110px">NGÀY NHẬP</th>
                                            <th scope="col">MÔ TẢ</th>
                                            <th scope="col">HÀNG</th>
                                            <th scope="col">LƯỢT XEM</th>
                                            <th scope="col">CHỨC NĂNG</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($dshh as $hh) {
                                            extract($hh);
                                            $del_link = "execute.php?ma_hh=" . $ma_hh;
                                            $edit_link = "edit.php?ma_hh=" . $ma_hh;
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" /></td>
                                                <th scope="row"><?php echo $ma_hh ?></th>
                                                <th scope="row"><img width="100" src="../../images/<?php echo $hinh ?>" class="img-thumbnail" alt="<?php echo $ten_hh ?>"></th>
                                                <th scope="row"><?php echo $ten_hh ?></th>
                                                <td scope="row">$<?php echo $don_gia ?></td>
                                                <td scope="row"><?php echo $giam_gia * 100 ?>%</td>
                                                <td scope="row"><?php echo $ngay_nhap ?></td>
                                                <td scope="row"><?php echo $mo_ta ?></td>
                                                <td scope="row"><?php echo ($dac_biet == 1) ? "Bình thường" : "Đặc biệt" ?></td>
                                                <td scope="row"><?php echo $so_luot_xem ?></td>
                                                <td style="display: flex;">
                                                    <a href=" <?php echo $edit_link ?>" class="btn btn-success">Sửa</a>
                                                    <a href="<?php echo $del_link ?>" class="btn btn-danger" style="margin-left: 1rem;">Xóa</a>
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