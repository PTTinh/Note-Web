<?php include "_header.php" ?>
<?php
if (isset($_SESSION["username"]) == false) {

    $username = "";
    if (is_post_method()) {
        $username = $_POST["user"] ?? "";
        $password = $_POST["password"] ?? "";

        // có nhập username
        if (empty($username) == false) {
            $sql = "select * from users where username=?";
            $user = db_select($sql, [$username]);
            if (count($user) == 0) {
                set_notify("Tên đăng nhập không tồn tại!");
                $username = "";
            } else {
                // nếu tồn tại username thì so sánh mật khẩu
                $user = $user[0];
                $user_id = $user['id'];
                // nếu mật khẩu người dùng nhập vào đúng => đăng nhập thành công
                if (password_verify($password, $user["password"]) == true) {
                    // Lưu thông tin username vào session
                    $_SESSION["user_id"] = $user_id;
                    $_SESSION["username"] = $username;
                    set_notify("Đăng nhập thành công!");
                    redirect_to("index.php", true);
                } else {
                    set_notify("Sai tên đăng nhập hoặc mật khẩu!");
                }
            }
        }
    }
} else {
    // redirect_to("index.php");
}
?>
<div class="login">
    <h1>Login</h1>
    <form action="" method="post">
        <div>
            <label for="user">Username</label>
            <input type="text" name="user" id="user" value="<?= $username ?>" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="two-col">
            <div class="one">
            </div>
            <div class="two">
                <label>
                    <a href="#">|Forgot password</a>
                </label>
            </div>
        </div>
        <div>
            <input type="submit" value="Login">
        </div>
        <div class="two-col" style="margin-top: 5px;">
            <div class="one">
                <label> Don't have an accoun?</label>
            </div>
            <div class="two">
                <label>
                    <a href="register.php">Register</a>
                </label>
            </div>
        </div>
    </form>
</div>
<?php include "_footer.php" ?>