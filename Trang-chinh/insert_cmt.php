<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require dirname(__DIR__) . "/PDO/binh-luan.php";
if (isset($_POST['binh_luan'])) {
    $ma_kh = $_POST['id_kh'];
    $ngay_binh_luan = date_format(date_create(), 'Y-m-d');
    // echo $_GET['ma_hh'];
    binh_luan_insert($ma_kh, $_GET['ma_hh'], $_POST['binh_luan'], $ngay_binh_luan);
    header("Location: ../shop-single.php?ma_hh=" . $_GET['ma_hh']);
}
