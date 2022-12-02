<?php
require_once "pdo.php";

// Them khach hang
function gio_hang_insert($ma_hh, $ma_hd, $so_luong)
{
    $sql = "INSERT INTO ct_hd(ma_hh,ma_hd,so_luong) VALUES (?,?,?,?)";
    pdo_execute($sql, $ma_hh, $ma_hd, $so_luong);
}
