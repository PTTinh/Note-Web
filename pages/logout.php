<?php
include "../include/common.php";
unset($_SESSION["username"]);
set_notify("Đăng xuất thành công!");
redirect_to("pages/login.php", true);
?>