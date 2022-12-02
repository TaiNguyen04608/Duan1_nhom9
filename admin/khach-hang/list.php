<?php
require "../../PDO/pdo.php";
require "../../PDO/khach-hang.php";
$dskh = khach_hang_select_all();
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#form1 #select-all").click(function() {
                $("#form1 input[type='checkbox']").prop('checked', this.checked);
            })
        })
    </script>
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
                        <h1><a style="color: black;margin-right: 2rem;" href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>Danh sách khách hàng</h1>
                    </div>
                    <div class="inbox-bx container-fluid">
                        <div class="row">
                            <div class="col-md-10">
                                <form action="execute.php" id="form1" method="POST">
                                    <table class="table table-stripped">
                                        <thead>
                                            <tr>
                                                <th scope="col"><input type="checkbox" id="select-all"></th>
                                                <th scope="col">Mã KH</th>
                                                <th scope="col">HỌ VÀ TÊN</th>
                                                <th scope="col">ĐỊA CHỈ EMAIL</th>
                                                <th scope="col">VAI TRÒ</th>
                                                <th scope="col">CHỨC NĂNG</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($dskh as $kh) {
                                                extract($kh);
                                                $del_link = "execute.php?ma_kh=" . $ma_kh;
                                                $edit_link = "edit.php?ma_kh=" . $ma_kh;
                                            ?>
                                                <tr>
                                                    <td><input name='delete_all_id[]' value='<?= $ma_kh ?>' type="checkbox" /></td>
                                                    <th scope="row"><?php echo $ma_kh ?></th>
                                                    <td scope="row"><?php echo $ho_ten ?></td>
                                                    <td scope="row"><?php echo $email ?></td>
                                                    <td scope="row"><?php echo ($vai_tro == 1) ? "Nhân viên" : "Khách hàng" ?></td>
                                                    <td>
                                                        <a href=" <?php echo $edit_link ?>" class="btn btn-success">Sửa</a>
                                                        <a href="<?php echo $del_link ?>" class="btn btn-danger" style="margin-left: 1rem;">Xóa</a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div>
                                        <button type="submit" name="delete_all_button" class="btn btn-danger">Xóa khách hàng được chọn</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>