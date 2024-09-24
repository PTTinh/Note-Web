<?php include "include/common.php";
function kt_dang_nhap($duongdan)
{
    if (isset($_SESSION["username"]) == false) {
        set_notify("Bạn cần đăng nhập để truy cập chức năng này!");
        redirect_to($duongdan, true);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Task Management</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= asset("css/style1.css") ?>">
    <link rel="stylesheet" href="<?= asset("css/notify.css") ?>">
</head>

<body>
    <div class="container">
        <header class="header">
            <nav class="nav">
                <ul>
                    <li><a href="#">Menu</a></li>
                </ul>
                <ul>
                    <li><a href="pages/logout.php">LogOut</a></li>
                </ul>
            </nav>
        </header>
        <section class="main">
            <aside class="aside-menu">
                <nav>
                    <ul>
                        <li><a href="note-list.php"><h1>Tất cả</h1></a></li>
                    </ul>
                </nav>
            </aside>
            <main>