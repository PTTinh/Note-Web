<?php
include "../include/common.php";
if (isset($_SESSION["username"]) == false) {
    set_notify("Bạn chưa đăng nhập!");
    redirect_to("pages/login.php", true);
}else {
    unset($_SESSION["username"]);
    set_notify("Đăng xuất thành công!");
    redirect_to("pages/login.php", true);
    redirect_to("index.php", true);
}

?>