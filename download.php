<?php
include "include/common.php";
// Đường dẫn đến tệp
$id = $_GET['id'] ?? 0;
$user_id = $_SESSION["user_id"] ?? 0;
$sql = "SELECT attachment FROM task WHERE id = ? AND create_user_id = ?";
$data = db_select($sql, [$id, $user_id]);
$file = $data[0]["attachment"];
// Kiểm tra xem tệp có tồn tại không
if (file_exists("upload/$file") && !empty($file)) {
    $file = "upload/$file";
    // Thiết lập các tiêu đề để buộc tải xuống
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));

    // Xóa bộ đệm đầu ra
    ob_clean();
    flush();

    // Đọc tệp và xuất nội dung của nó
    readfile($file);
    exit;
} else {
    set_notify('Không tìm thấy tệp.');
    redirect_to("note-view.php?id=$id", true);
}
include "component/_notify.php";
