

            <!-- CONTENT -->
            <div class="cntProduct">              
                <div class="input-head">
                    <h2>Đăng nhập</h2>
                </div>

                <form method="post" action="index.php?a=login.php">
                    <div class="input-group">
                        <?php include('subPage/error.php'); ?>
                        <label for="">Tài khoản</label>
                        <input type="text" name="username" placeholder="Username..." maxlength="30">
                        <label for="">Mật khẩu</label>
                        <input type="password" name="password" placeholder="Pasword..." maxlength="30">
                        <button type="submit" name="log_user">Đăng nhập</button>
                        <label>Chưa có tài khoản? <a href="index.php?a=signup.php"> Đăng ký</a></label>                              
                </div>
                </form>
                

            </div>
