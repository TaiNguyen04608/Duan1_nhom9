<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require dirname(__DIR__) . "/PDO/hang-hoa.php";
require dirname(__DIR__) . "/PDO/gio-hang.php";
// Database connection
$db = pdo_get_connection();
$perPage = 6;

// Calculate Total pages
$stmt = $db->query('SELECT count(*) FROM hang_hoa');
$total_results = $stmt->fetchColumn();
$total_pages = ceil($total_results / $perPage);

// Current page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$starting_limit = ($page - 1) * $perPage;

// Query to fetch users
$query = "SELECT * FROM hang_hoa ORDER BY ma_hh DESC LIMIT $starting_limit,$perPage";

// Fetch all users for current page
// $users = pdo_query($query);

if (isset($_GET['ma_loai'])) {
    $items = hang_hoa_select_by_loai($_GET['ma_loai']);
} elseif (isset($_POST['key_word'])) {
    $items = hang_hoa_select_keyword($_POST['key_word']);
} else {
    $items = pdo_query($query);
}
?>
<div class="row">
    <div>
        <form action="shop.php" method="post" class="modal-content modal-body border-0 p-0">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="inputModalSearch" name="key_word" placeholder="Search ...">
                <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
        </form>
    </div>
    <?php
    foreach ($items as $item) {
        extract($item);
        // $link = "./shop.php?ma_loai=" . $ma_loai;
    ?>
        <div class="col-md-4">
            <form action="cart.php?action=add" method="post">
                <div class="card mb-4 product-wap rounded-0">
                    <div class="card rounded-0">
                        <img class="card-img rounded-0 img-fluid" style="float: left;object-fit: cover;height: 300px;width: 100%;" src="images/<?php echo $hinh ?>">
                        <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                            <ul class="list-unstyled">
                                <li><a class="btn btn-success text-white" href="shop-single.php"><i class="far fa-heart"></i></a></li>
                                <li><a class="btn btn-success text-white mt-2" href="shop-single.php?ma_hh=<?php echo $ma_hh ?>"><i class="far fa-eye"></i></a></li>
                                <li><button class="btn btn-success text-white mt-2"><i class="fas fa-cart-plus"></i></button></li>
                            </ul>
                        </div>
                    </div>
                    <input type="hidden" name="gh_ma_hh[<?= $ma_hh ?>]" value="1">
                    <div class="card-body">
                        <a href="shop-single.php?ma_hh=<?php echo $ma_hh ?>" class="h3 text-decoration-none"><?php echo $ten_hh ?></a>
                        <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                            <li>M/L/X/XL</li>
                            <li class="pt-2">
                                <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                            </li>
                        </ul>
                        <p class="text-center mb-0">$<?php echo $don_gia ?></p>
                    </div>
                </div>
            </form>
        </div>
    <?php
    }
    ?>
    <div div="row">
        <ul class="pagination pagination-lg justify-content-end">
            <?php
            if (!isset($_GET['ma_loai']) && !isset($_POST['key_word'])) {
                for ($page = 1; $page <= $total_pages; $page++) {
            ?>
                    <li class="page-item">
                        <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="?page=<?php echo $page ?>" tabindex="-1"><?php echo $page ?></a>
                    </li>
            <?php
                }
            }
            ?>
        </ul>
    </div>
</div>