<?php
require "../../PDO/pdo.php";
require "../../PDO/binh-luan.php";
require "../../PDO/hang-hoa.php";
if (isset($_GET['ma_bl'])) {
    $ma_hh = $_GET['ma_hh'];
    binh_luan_delete($_GET['ma_bl']);
    header("Location: details.php?ma_hh=$ma_hh");
}
if (isset($_POST['delete_all_button'])) {
    $ma_hh = $_POST['ma_hh'];
    $all_id = $_POST['delete_all_id'];
    binh_luan_delete($all_id);
    header("Location: details.php?ma_hh=$ma_hh");
}
