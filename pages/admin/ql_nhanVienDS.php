<div class="content">
    <div class="user_menu">
        <button class="hvr-box-shadow-inset" onclick="location.replace('index.php?a=ql_nhanVien.php')">Thêm nhân viên</button>  
        <button class="hvr-box-shadow-inset" onclick="location.replace('index.php?a=ql_nhanVienDS.php')">Xem danh sách nhân viên</button>  
    </div>  
    <div class="user_info">
        <table class="p_table">
            <tr id="headline" style="background-color: #F89406; color: white;">
                <td>ID</td>
                <td>Loai Tk</td>
                <td>Tên đăng nhập</td>
                <td>Mật khẩu</td>
                <td>Email</td>
                <td>Thao tác</td>
            </tr>
            <?php 
                $query = "SELECT * FROM user WHERE loai = 'A'";
                $result = mysqli_query($db,$query);
                if(mysqli_num_rows($result) > 0):
                    while($row = mysqli_fetch_array($result)): ?>
            <tr>
                <td><?php echo $row["id"] ?></td>
                <td><?php echo $row["loai"]; ?></td>
                <td><?php echo $row["username"] ?></td>
                <td><?php echo $row["password"] ?></td>
                <td><?php echo $row["email"] ?></td>
                <td align="center"><a href="index.php?a=ql_nguoi_dung.php&action=u_del&id=<?php echo $row["id"]; ?>">Xoá</a></td>
            </tr>
            <?php endwhile; endif;  ?>
        </table>
    </div>
</div>