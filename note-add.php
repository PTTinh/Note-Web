<?php include "_header.php";
kt_dang_nhap("pages/login.php");
?>
<?php
$user_id = $_SESSION["user_id"] ?? 0;
$create_date = date('Y-m-d H:i:s');
if (is_post_method()) {
    $user_id = $_SESSION["user_id"] ?? 0;
    $content = $_POST['content'] ?? '';
    $attachment = upload_and_return_filename("attachment") ?? "";
    $sql = "INSERT INTO task (content, attachment, create_date, create_user_id)
            VALUES (?, ?, ?, ?)";
    $data = [$content, $attachment, $create_date, $user_id];
    $result =  db_execute($sql, $data, $id);
    if ($result == true) {
        set_notify("Thêm ghi chú thành công");
        redirect_to("note-view.php?id=$id", true);
    } else {
        set_notify("Thêm ghi chú thất bại");
    }
}
?>
<div class="note-add">
    <h1>Tạo ghi chú</h1>
    <form action="note-add.php" method="post" enctype="multipart/form-data">
        <div class="content">
            <p><?= $create_date ?></p>
            <textarea name="content" placeholder="Nội dung" cols="30" rows="30" required></textarea>
        </div>
        <div class="file">
            <label for="attachment">File đính kèm</label>
            <input type="file" name="attachment" id="attachment">
        </div>
        <div class="submit">
            <input type="submit" value="Tạo ghi chú">
        </div>
    </form>
</div>
<?php include "_footer.php" ?>
