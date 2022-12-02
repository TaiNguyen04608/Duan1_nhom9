<?php

require_once "pdo.php";

// truy van tat ca cac loai
function loai_selectall()
{
    $sql = "SELECT * from loai";
    return pdo_query($sql);
}
// them loai
function loai_insert($ten_loai)
{
    $sql = "INSERT into loai(ten_loai) values(?)";
    pdo_execute($sql, $ten_loai);
}
// xoa loai
function loai_delete($ma_loai)
{
    $sql = "DELETE from loai where ma_loai=?";
    pdo_execute($sql, $ma_loai);
}
// Lay thong tin 1 ma loai
function loai_query_one($ma_loai)
{
    $sql = "select * from loai where ma_loai=?";
    return pdo_query_one($sql, $ma_loai);
}

function loai_exist($ten_loai)
{
    $sql = "SELECT * FROM loai WHERE ten_loai = ?";
    return pdo_query_one($sql, $ten_loai);
}
// cap nhat loai
function loai_update($ma_loai, $ten_loai)
{
    $sql = "update loai set ten_loai=? where ma_loai=?";
    pdo_execute($sql, $ten_loai, $ma_loai);
}
