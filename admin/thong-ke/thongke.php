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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
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
                        <h1><a style="color: black;margin-right: 2rem;" href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>Biểu đồ hàng hóa</h1>
                    </div>
                    <div style="width: 800px;margin: auto;">
                        <h1><?php
                            foreach ($tkhh as $hh) {
                                extract($hh);
                                $mang_ten_loai[] = $ten_loai;
                                $mang_so_luong[] = $so_luong;
                            }
                            ?>
                        </h1>
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                    <script>
                        const ctx = document.getElementById('myChart').getContext('2d');
                        const myChart = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: <?php echo json_encode($mang_ten_loai) ?>,
                                datasets: [{
                                    label: 'Tỷ lệ hàng hóa',
                                    data: <?php echo json_encode($mang_so_luong) ?>,
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</body>

</html>