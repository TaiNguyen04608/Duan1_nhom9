<?php
require "../../PDO/pdo.php";
require "../../PDO/loai.php";



// if (isset($_POST['ten_loai'])) {
//     $ten_loai = $_POST['ten_loai'];
//     if (loai_exist($ten_loai)) {
//         $MESSAGE = "Tên loại không được trùng";
//     } else {
//         loai_insert($ten_loai);
//         $MESSAGE = "Thêm loại thành công";
//     }
//     header("Location: index.php");
// }

if (isset($_GET['ma_loai'])) {
    loai_delete($_GET['ma_loai']);
    header("Location: list.php");
}
