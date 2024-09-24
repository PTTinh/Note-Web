<?php
include "include/common.php";
$user_id = $_SESSION["user_id"] ?? 0;
$id = $_GET['id'] ?? 0;
$sql = "SELECT attachment FROM task WHERE id = ? AND create_user_id = ?";
$data1 = db_select($sql, [$id, $user_id]);
$sql = "DELETE FROM task WHERE id = ? AND create_user_id = ?";
$data = db_execute($sql, [$id, $user_id]);
if ($data == true) {
    if (!empty($data1)) {
        remove_file($data1[0]["attachment"]);
    }
    set_notify("Xóa ghi chú thành công");
    redirect_to("note-list.php?xt=1", true);
} else {
    set_notify("Xóa ghi chú thất bại");
}
