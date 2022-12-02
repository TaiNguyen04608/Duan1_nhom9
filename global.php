<?php
session_start();
$ROOT_URL = "../Xshop";
$ADMIN_URL = "$ROOT_URL/admin/";
$CONTENT_URL = "$ROOT_URL/assets/";

function exist_param($filedname)
{
    return array_key_exists($filedname, $_REQUEST);
}

function add_cookie($name, $value, $day)
{
    setcookie($name, $value, time() + (86400 * $day), "/");
}

function delete_cookie($name)
{
    add_cookie($name, "", -1);
}

function get_cookie($name)
{
    return $_COOKIE[$name] ?? '';
}

function check_login()
{
    global $SITE_URL;
    if (isset($_SESSION['user'])) {
        if ($_SESSION['user']['vai_tro'] == 1) {
            return;
        }
        if (strpos($_SERVER["REQUEST_URI"], '/admin/') == FALSE) {
            return;
        }
    }
    $_SESSION['request_uri'] = $_SERVER["REQUEST_URI"];
    header("location: $SITE_URL/tai-khoan/dang-nhap.php");
}
