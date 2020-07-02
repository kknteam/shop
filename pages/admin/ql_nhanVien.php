<div class="content">
    <div class="user_menu">
        <button class="hvr-box-shadow-inset" onclick="location.replace('index.php?a=ql_nhanVien.php')">Thêm nhân viên</button>  
        <button class="hvr-box-shadow-inset" onclick="location.replace('index.php?a=ql_nhanVienDS.php')">Xem danh sách nhân viên</button>  
    </div>
    <div class="user_info">
    <table class="tab">
    <form action="index.php?a=ql_nhanVien.php" method="post">
        <h1>THÔNG TIN NHÂN VIÊN</h1>
        <tr style="border: none">
            <td><h5>Họ tên</h5></td>
            <td colspan="2"><input type="text" name ="nv_ten" ></td>
        </tr style="border: none">
        <tr>
            <td><h5>Giới tính</h5></td>
            <td><input type="radio" name="nv_gender"
                <?php if (isset($gender) && $gender=="female") echo "checked";?>
                value="nữ">Nữ</td>
            <td><input type="radio" name="gender"
                <?php if (isset($gender) && $gender=="male") echo "checked";?>
                value="nam">Nam</td>
        </tr>
        <tr>
            <td><h5>Email</h5></td>
            <td colspan="2"><input type="text" name ="nv_email" ></td>
        </tr>
        <tr>
            <td><h5>Số điện thoại</h5></td>
            <td colspan="2"><input type="text" name ="nv_sdt"></td>
        </tr>
        <tr>
            <td><h5>Địa chỉ liên lạc:</h5></td>
            <td colspan="2"><input type="text" name ="nv_diachi" ></td>
        </tr>
        <tr>
            <td colspan="3"><input class="sub" type="submit" name="tnv_submit" value="Thêm NV"></td>
        </tr>

        
    </form>  
        <?php ?>  
</table>
    </div>
</div>