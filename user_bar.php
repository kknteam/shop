<?php if(isset($_SESSION['username'])) : ?>
    <?php 
        $name = $_SESSION['username'];
        $query = "SELECT loai FROM user WHERE username = '$name'";
        $result = mysqli_query($db, $query);
        while($row = mysqli_fetch_array($result)):
    ?>
    <div class="admin">
        <ul type="none"> 
                <?php if($row['loai'] == 'A'): ?>
                    <li><a href="index.php?a=ql_nguoi_dung.php"> Quản lý người dùng</a></li>
                    <li><a href="index.php?a=ql_sanPham.php">Quản lý sản phẩm</a></li> 
                     <?php if($_SESSION['username']=='admin'): ?>
                    <li><a href="index.php?a=ql_nhanVien.php">Quản lý nhân viên</a></li>  
                    <?php endif; ?>                           
                <?php endif ?>           
        </ul>                
    </div>
    <?php endwhile; ?>
<?php endif ?> 