

<div class="content">
    <?php include("subPage/user_menu.php"); ?>

    <div class="user_info">
        <h1>Đặt lại mật khẩu</h1>
        <?php include("subPage/error.php"); ?>
        <form action="index.php?a=thong_tin_MK.php" method="POST">
            <br>
            Mật khẩu cũ: <br>
            <input type="password" name="pass_1"> <br>
            Mật khẩu mới: <br>
            <input name="pass_2" type="password"><br>
            Nhập lại mật khảu mới:<br>
            <input name="repass_2" type="password"><br>
            <input type="submit" name="repass_submit" class="sub">
        </form>
    </div>
</div>