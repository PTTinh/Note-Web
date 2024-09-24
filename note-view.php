<?php include "_header.php" ?>
<?php
kt_dang_nhap("pages/login.php");
$id = $_GET['id'] ?? 0;
$user_id = $_SESSION["user_id"] ?? 0;
if (is_post_method()) {
    $content = $_POST['content'] ?? '';
    $create_date = date('Y-m-d H:i:s');
    $attachment = upload_and_return_filename("attachment") ?? "";

    if (empty($attachment)) {
        $sql = "UPDATE task SET content = ?, create_date = ? WHERE create_user_id = ? AND id = ?";
        $data = [$content, $create_date, $user_id, $id];
    } else {
        $sql = "SELECT attachment FROM task WHERE id = ? AND create_user_id = ?";
        $data = db_select($sql, [$id, $user_id]);
        remove_file($data[0]["attachment"]);
        $sql = "UPDATE task SET content = ?, attachment = ?, create_date = ? WHERE create_user_id = ? AND id = ?";
        $data = [$content, $attachment, $create_date, $user_id, $id];
    }
    $result =  db_execute($sql, $data);
    if ($result == true) {
        set_notify("Lưu ghi chú thành công");
        redirect_to("note-list.php", true);
    } else {
        set_notify("Lưu ghi chú thất bại");
    }
}
$sql = "SELECT * FROM task WHERE create_user_id = ? AND id = ?";
$notes = db_select($sql, [$user_id, $id]);
if (count($notes) == 0) {
    set_notify("Không tìm thấy ghi chú");
    redirect_to("note-list.php", true);
} else {
    $notes = $notes[0];
}
?>


<div class="note-view">
    <h1>Ghi chú</h1>
    <form action="note-view.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
        <div>
            <div class="content">
                <p><?= $notes['create_date'] ?></p>
                <textarea name="content" placeholder="Nội dung" cols="30" rows="30"><?= $notes["content"] ?></textarea>
            </div>
        </div>
        <div class="file-download">
            <p>File: <?= $notes["attachment"] ?></p>
            <a title="Tải xuống" onclick="return confirm('Xác nhận tải xuống')" href="download.php?id=<?=$id?>"><i class='bx bx-download'></i></a>
        </div>
        <div class="file-upload">
            <label for="attachment">Đổi file:</label>
            <input type="file" name="attachment" id="attachment">
        </div>
        <div class="submit">
            <input type="submit" value="Lưu">
        </div>

    </form>
</div>
<?php include "_footer.php" ?>