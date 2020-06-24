
            <!-- CONTENT -->
            <div class="cntProduct">
                <div class="input-head">
                    <h2>Đăng ký</h2>
                </div>     
                
                    <!--Form -->  
                    <form action="index.php?a=signup.php" method="post"> 
                        <?php include('subPage/error.php') ?>    
                        <div class="input-group">       
                            <label for="">Họ tên: </label>
                            <input type="text" name="username">
                            <label for="">Email:  </label>                   
                            <input type="email" name="email" placeholder="name@gmail.com">
                            <label for="">Mật khẩu: </label>                    
                            <input type="password" name="password_1" placeholder="Atleast 6 characters...">
                            <label for="">Nhập lại mật khẩu: </label>                   
                            <input type="password" name="password_2">

                            <!-- <input type="checkbox" name="check">Agree our<a href="#term">term and policy</a>  -->
                            <button type="submit" name="sig_user">Tạo tài khoản</button>  
                            <label for="">Đã có tài khoản?<a href="index.php?a=login.php"> Đăng nhập</a></label>
                        </div>
                    </form>
                    

                          
            </div>

