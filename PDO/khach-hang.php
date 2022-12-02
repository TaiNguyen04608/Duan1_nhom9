<?php

require_once "pdo.php";
// pdo_get_connection();
// Them khach hang
function khach_hang_insert($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro)
{
    $sql = "INSERT INTO khach_hang(ma_kh,mat_khau,ho_ten,kich_hoat,hinh,email,vai_tro) values(?,?,?,?,?,?,?)";
    pdo_execute($sql, $ma_kh, $mat_khau, $ho_ten, (int)$kich_hoat, $hinh, $email, (int)$vai_tro);
}

// Cap nhat thong tin khach hang

function khach_hang_update($tai_khoan, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro, $ma_kh)
// function khach_hang_update($ho_ten, $ma_kh)
{
    $sql = "UPDATE khach_hang set ma_kh=?,mat_khau=?,ho_ten=?,email=?,hinh=?,kich_hoat=?,vai_tro=? where ma_kh=?";
    pdo_execute($sql, $tai_khoan, $mat_khau, $ho_ten, $email, $hinh, (int)$kich_hoat, (int)$vai_tro, $ma_kh);
}

// Xoa khach hang
function khach_hang_delete($ma_kh)
{
    $sql = "DELETE from khach_hang where ma_kh=?";
    if (is_array($ma_kh)) {
        foreach ($ma_kh as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $ma_kh);
    }
}

// Truy van nhieu khach hang
function khach_hang_select_all()
{
    $sql = "SELECT * from khach_hang";
    return pdo_query($sql);
}

// Truy van khach hang bang id
function khach_hang_select_by_id($ma_kh)
{
    $sql = "SELECT * from khach_hang where ma_kh=?";
    return pdo_query_one($sql, $ma_kh);
}

// Xem khach hang co ton tai khong
function khach_hang_exist($ma_kh)
{
    $sql = "SELECT count(*) from khach_hang where ma_kh=?";
    return pdo_query_value($sql, $ma_kh) > 0;
}

// Xem vai tro khach hang
function khach_hang_select_by_role($vai_tro)
{
    $sql = "SELECT count(*) from khach_hang where vai_tro=?";
    return pdo_query($sql, $vai_tro);
}

// Chuc nang doi mat khau
function khach_hang_change_password($ma_kh, $mat_khau)
{
    $sql = "UPDATE khach_hang set mat_khau=? where ma_kh=?";
    $r = pdo_execute($sql, $mat_khau, $ma_kh);
}
