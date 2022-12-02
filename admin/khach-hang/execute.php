<?php
require "../../PDO/pdo.php";
require "../../PDO/khach-hang.php";

if (isset($_POST['tai_khoan'])) {
    $ma_kh = $_POST['tai_khoan'];
    $mat_khau = $_POST['mat_khau'];
    $ho_ten = $_POST['ho_ten'];
    $email = $_POST['email'];
    $hinh = $_FILES['hinh']['name'];
    $vai_tro = $_POST['vai_tro'];
    $kich_hoat = $_POST['kich_hoat'];
    $target = '../../images/' . basename($_FILES['hinh']['name']);
    if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target)) {
        khach_hang_insert($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro);
    }
    header("Location: index.php");
}

if (isset($_GET['ma_kh'])) {
    khach_hang_delete($_GET['ma_kh']);
    header("Location: list.php");
}

if (isset($_POST['delete_all_button'])) {
    $all_id = $_POST['delete_all_id'];
    khach_hang_delete($all_id);
    header("Location: list.php");
}
