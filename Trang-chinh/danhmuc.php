<?php
require_once "./global.php";
require_once "./PDO/loai.php";
// require_once "./PDO/hang-hoa.php";
$dsl = loai_selectall();
?>
<div class="col-lg-3">
    <h1 class="h2 pb-4">Danh mục</h1>
    <ul class="list-unstyled templatemo-accordion">
        <a href="./shop.php" class="pb-3 collapsed d-flex justify-content-between h3 text-decoration-none">Tất cả</a>
        <?php
        foreach ($dsl as $l) {
            extract($l);
            $link = "./shop.php?ma_loai=" . $ma_loai;
        ?>
            <a class="pb-3 collapsed d-flex justify-content-between h3 text-decoration-none" href="<?php echo $link ?>">
                <?php echo $ten_loai ?>
            </a>
        <?php
        }
        ?>
    </ul>
</div>