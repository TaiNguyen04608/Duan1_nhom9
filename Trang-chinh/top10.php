<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// require "PDO/pdo.php";
// require "PDO/hang-hoa.php";
$top10 = hang_hoa_select_top10();
?>
<div class="row">
    <?php
    foreach ($top10 as $item) {
        extract($item);
    ?>
        <div class="col-12 col-md-4 mb-4">
            <div class="card h-100">
                <a href="shop-single.php?ma_hh=<?php echo $ma_hh ?>">
                    <img src="./images/<?php echo $hinh ?>" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <ul class="list-unstyled d-flex justify-content-between">
                        <li class="text-black-50 text-right">$<?php echo $don_gia ?></li>
                    </ul>
                    <a href="shop-single.php" class="h2 text-decoration-none text-dark"><?php echo $ten_hh ?></a>
                    <p class="card-text">
                        <?php echo $ten_loai ?>
                    </p>
                    <p class="text-muted">Reviews (<?php echo $so_luot_xem ?>)</p>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>