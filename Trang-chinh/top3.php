<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "PDO/pdo.php";
require_once "PDO/hang-hoa.php";
$top3 = hang_hoa_select_top3();
?>

<div class="row">
    <?php
    foreach ($top3 as $item) {
        extract($item);
    ?>
        <div class="col-12 col-md-4 p-5 mt-3">
            <a href="shop-single.php?ma_hh=<?php echo $ma_hh ?>"><img src="./images/<?php echo $hinh ?>" class="rounded-circle img-fluid border"></a>
            <h5 class="text-center mt-3 mb-3"><?php echo $ten_loai ?></h5>
            <p class="text-center"><a href="shop.php" class="btn btn-success">Go Shop</a></p>
        </div>
    <?php
    }
    ?>
</div>