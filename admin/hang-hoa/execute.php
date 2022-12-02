<?php
require "../../PDO/pdo.php";
require "../../PDO/hang-hoa.php";
require "../../global.php";

// if (isset($_POST['ten_hh'])) {
//     $ten_hh = $_POST['ten_hh'];
//     $don_gia = $_POST['don_gia'];
//     $giam_gia = $_POST['giam_gia'];
//     $loai_hang = $_POST['loai_hang'];
//     $hinh = $_FILES['hinh']['name'];
//     $ngay = $_POST['ngay'];
//     $hang_db = $_POST['hang_db'];
//     $mo_ta = $_POST['mo_ta'];
//     $target = '../../images/' . basename($_FILES['hinh']['name']);
//     if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target)) {
//         hang_hoa_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ngay, $mo_ta, (int)$hang_db, $loai_hang);
//         header("Location: index.php");
//     } else {
//         echo "Error";
//     }
// }

if (isset($_GET['ma_hh'])) {
    hang_hoa_delete($_GET['ma_hh']);
    header("Location: list.php");
}
