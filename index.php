<?php include "_header.php" ?>
<?php
$user_id = $_SESSION["user_id"] ?? 0;
$sql = "SELECT * FROM task WHERE create_user_id = ?";
$notes = db_select($sql, [$user_id]);
if (count($notes) == 0) {
    redirect_to("note-add.php");
} else {
    redirect_to("note-list.php");
}
?>
<?php include "_footer.php" ?>