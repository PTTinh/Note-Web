<?php include "_header.php" ?>
<?php
if (isset($_SESSION["username"]) == false) {
    if (is_post_method()) {
        $user = $_POST['user'] ?? "";
        $password = $_POST['password'] ?? "";
        $sql = "select * from users where username=?";
        $data = db_select($sql, [$user]);
        if (count($data) == 0) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, password) 
        VALUES (?, ?)";
            $data = [$user, $password];
            db_execute($sql, $data);
            set_notify("Đăng ký thành công");
            redirect_to("pages/login.php", true);
        } else {
            set_notify("Username đã tồn tại");
        }
    }
} else {
    redirect_to("index.php");
}

?>
<div class="login">
    <h1>Register</h1>
    <form action="" method="post">
        <div>
            <label for="user">Username</label>
            <input type="text" name="user" id="user" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="two-col">
            <div class="one">
                <input type="checkbox" id="register-check">
                <label for="register-check"> Remember Me</label>
            </div>
            <div class="two">
                <label>
                    <a href="#">Terms & conditions</a>
                </label>
            </div>
        </div>
        <div>
            <input type="submit" value="Register">
        </div>
        <div class="two-col" style="margin-top: 5px;">
            <div class="one">
                <label>Have an accoun?</label>
            </div>
            <div class="two">
                <label>
                    <a href="login.php">Login</a>
                </label>
            </div>
        </div>
    </form>
</div>
<?php include "_footer.php" ?>