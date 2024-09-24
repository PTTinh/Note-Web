<?php
include "_header.php";
kt_dang_nhap("pages/login.php");
$user_id = $_SESSION["user_id"] ?? 0;
$sql = "SELECT * FROM task WHERE create_user_id = ?";
$notes = db_select($sql, [$user_id]);
$note = $notes[0];
$count = count($notes);
$xt = $_GET['xt'] ?? 0;
$tmp = empty($xt) ? true : false;

?>
<div class="note-list">
    <h2>Danh sách ghi chú</h2>
    <div class="card-list">
        <?php
        $i = 0;
        $n = 11;
        foreach ($notes as $key => $note) {
            $i++;
            if ($i > $n) {
                if ($tmp) {
                    break;
                }
                $n += 12;
            }
        ?>
            <div class="card">
                <div class="card-header">
                    <div></div>
                    <a onclick="return confirm('Xác nhận xóa')" href="note-delete.php?id=<?= $note['id'] ?>" title="Xóa ghi chú">&times;</a>
                </div>
                <div class="card-main">
                    <a title="Xem ghi chú" href="note-view.php?id=<?= $note['id'] ?>" style="text-decoration: none; color: black;">
                        <div class="card-title">
                            <h3><?= substr($note['content'], 0, 10) ?></h3>
                        </div>
                        <div class="card-info">
                            <p>
                                <?= substr($note['content'], 10, 30) ?>
                            </p>
                        </div>
                        <div>
                            <p style="font-size: x-small;">
                                <?= $note['create_date'] ?>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        <?php } ?>
        <div class="xt">
            <br>
            <?php
            if ($count > 12) {
                $tmp = $n >= $count ? true : false;
                echo !$tmp ? "<a href='note-list.php?xt=1'>Xem thêm</a>" : "<a href='note-list.php'>Ẩn bớt</a>";
            }
            ?>
        </div>
    </div>
</div>
<div class="create-note">
    <label>
        <a href="note-add.php" title="Tạo ghi chú">+</i></a>
    </label>
</div>
<?php if (empty($notes)) {
    echo "<div style='text-align: center; margin: auto;'>
            Danh sách trống.
</div>";
} ?>

<?php include "_footer.php" ?>