<?php

require_once "pdo.php";

// Them khach hang
function binh_luan_insert($ma_kh, $ma_hh, $noi_dung, $ngay_bl)
{
    $sql = "INSERT INTO binh_luan(ma_kh,ma_hh,noi_dung,ngay_bl) VALUES (?,?,?,?)";
    pdo_execute($sql, $ma_kh, $ma_hh, $noi_dung, $ngay_bl);
}

// Cap nhat thong tin khach hang
function binh_luan_update($ma_kh, $ma_bl, $noi_dung, $ngay_bl)
{
    $sql = "UPDATE binh_luan SET ma_kh=?,noi_dung=?,ngay_bl=? WHERE ma_bl=?";
    pdo_execute($sql, $ma_kh, $noi_dung, $ngay_bl, $ma_bl);
}

// Xoa khach hang
function binh_luan_delete($ma_bl)
{
    $sql = "DELETE from binh_luan where ma_bl=?";
    if (is_array($ma_bl)) {
        foreach ($ma_bl as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $ma_bl);
    }
}

// Truy van nhieu khach hang
function binh_luan_select_all()
{
    $sql = "SELECT * from binh_luan bl ORDER BY ngay_bl DESC";
    return pdo_query($sql);
}

// Truy van khach hang bang id
function binh_luan_select_by_id($ma_bl)
{
    $sql = "SELECT * from WHERE ma_bl=?";
    return pdo_query_one($sql, $ma_bl);
}

// Xem binh luan co ton tai khong
function binh_luan_exist($ma_bl)
{
    $sql = "SELECT count(*) FROM binh_luan WHERE ma_bl=?";
    return pdo_query_value($sql, $ma_bl) > 0;
}

// Tong binh luan cua hang hoa
function binh_luan_total($ma_hh)
{
    $sql = "SELECT count(*) FROM binh_luan WHERE ma_hh=?";
    return pdo_query_value($sql, $ma_hh);
}

// Chuc nang binh luan theo hang hoa
function binh_luan_select_by_hang_hoa($ma_hh)
{
    $sql = "SELECT binh_luan.*,hang_hoa.ten_hh,khach_hang.ho_ten,khach_hang.hinh FROM binh_luan JOIN hang_hoa ON binh_luan.ma_hh = hang_hoa.ma_hh JOIN khach_hang ON khach_hang.ma_kh = binh_luan.ma_kh WHERE hang_hoa.ma_hh = ? ORDER BY ngay_bl DESC";
    return pdo_query($sql, $ma_hh);
}
