<?php

require_once "pdo.php";

// Them hang hoa
function hang_hoa_insert($ten_hang, $don_gia, $giam_gia, $hinh, $ngay_nhap, $mo_ta, $dac_biet, $ma_loai)
{
    $sql = "INSERT INTO hang_hoa(ten_hh, don_gia, giam_gia, hinh, ngay_nhap, mo_ta, dac_biet,ma_loai) 
        VALUES('$ten_hang', '$don_gia', '$giam_gia', '$hinh', '$ngay_nhap', '$mo_ta', '$dac_biet','$ma_loai')";
    return pdo_execute($sql);
}

// Cap nhat hang hoa
function hang_hoa_update($ten_hang, $don_gia, $giam_gia, $hinh, $ngay_nhap, $mo_ta, $dac_biet, $ma_loai, $ma_hh)
{
    $sql = "UPDATE hang_hoa SET ten_hh = '$ten_hang',
                                    don_gia = '$don_gia',
                                    giam_gia = $giam_gia,
                                    hinh = '$hinh',
                                    ngay_nhap = '$ngay_nhap',
                                    mo_ta = '$mo_ta',
                                    ma_loai = '$ma_loai',
                                    dac_biet = '$dac_biet' 
                                    WHERE ma_hh = $ma_hh";
    return pdo_query_one($sql);
}

// Xoa hang
function hang_hoa_delete($ma_hh)
{
    $sql = "DELETE FROM hang_hoa WHERE ma_hh= ?";
    return pdo_query_one($sql, $ma_hh);
}


// Truy van nhieu hang hoa
function hang_hoa_select_all()
{
    $sql = "select * from hang_hoa";
    return pdo_query($sql);
}

// Truy van hang hoa bang id
function hang_hoa_select_by_id($ma_hh)
{
    $sql = "SELECT * FROM hang_hoa INNER JOIN loai ON hang_hoa.ma_loai=loai.ma_loai WHERE ma_hh=?";
    return pdo_query_one($sql, $ma_hh);
}

// Xem hang hoa co ton tai khong
function hang_hoa_exist($ma_hh)
{
    $sql = "SELECT * FROM hang_hoa WHERE ma_hh = ?";
    return pdo_query_one($sql, $ma_hh);
}

// Chuc nang tang so luot xem
function hang_hoa_tang_so_luot_xem($ma_hh)
{
    $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh = ?";
    return pdo_query($sql, $ma_hh);
}

// Truy van top 10 hang hoa
function hang_hoa_select_top10()
{
    $sql = "SELECT * FROM hang_hoa INNER JOIN loai ON hang_hoa.ma_loai=loai.ma_loai ORDER by so_luot_xem DESC limit 0,10";
    return pdo_query($sql);
}

// Truy van top 3 hang hoa
function hang_hoa_select_top3()
{
    $sql = "SELECT * FROM hang_hoa INNER JOIN loai ON hang_hoa.ma_loai=loai.ma_loai ORDER by so_luot_xem DESC limit 0,3";
    return pdo_query($sql);
}

// Truy van hang hoa co danh dau dac biet
function hang_hoa_select_dac_biet()
{
    $sql = "SELECT * FROM hang_hoa WHERE dac_biet = 1";
    return pdo_query($sql);
}



// Truy van bang loai(category)
function hang_hoa_select_by_loai($ma_loai)
{
    $sql = "SELECT * FROM hang_hoa INNER JOIN loai ON hang_hoa.ma_loai=loai.ma_loai WHERE hang_hoa.ma_loai = ?";
    return pdo_query($sql, $ma_loai);
}
// Truy van bang tu khoa
function hang_hoa_select_keyword($keyword)
{
    $sql = "SELECT * FROM hang_hoa hh JOIN loai lo ON lo.ma_loai=hh.ma_loai
                WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
    return pdo_query($sql, '%' . $keyword . '%', '%' . $keyword . '%');
}
