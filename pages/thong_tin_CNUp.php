<div class="content">
<style>
    .tab {border-collapse:collapse;}
    .tab .first {border-bottom:1px solid #EEE;}
    .tab .second {border-top:1px solid #CCC;box-shadow: inset 0 1px 0 #CCC;}
</style>
<?php   include("subPage/user_menu.php"); ?>
<div class="user_info">
<table class="tab">
    <form action="index.php?a=thong_tin_CN.php" method="post">
    <?php
        $name = $_SESSION["username"];
        $query = "SELECT * FROM user u, thong_tin_user tt WHERE username = '$name' and u.id = tt.id";
        $result = mysqli_query($db, $query);
        // if(mysqli_num_rows($result) > 0):
      
        $row = mysqli_fetch_array($result);
    ?>

        <h1>THÔNG TIN CÁ NHÂN</h1>
        <input type="hidden" name="tt_id" value="<?php echo $_GET["id"]; ?>">
        <tr style="border: none">
            <td><h5>Họ tên</h5></td>
            <td colspan="2"><input type="text" name ="tt_ten" value="<?php echo $row["ten"]; ?>"></td>
        </tr style="border: none">
        <tr>
            <td><h5>Giới tính</h5></td>
            <td><input type="radio" name="gender"
                <?php if (isset($gender) && $gender=="female") echo "checked";?>
                value="nữ">Nữ</td>
            <td><input type="radio" name="gender"
                <?php if (isset($gender) && $gender=="male") echo "checked";?>
                value="nam">Nam</td>
        </tr>
        <tr>
            <td><h5>Email</h5></td>
            <td colspan="2"><input type="text" name ="tt_email" value="<?php echo $row["email"]; ?>"></td>
        </tr>
        <tr>
            <td><h5>Số điện thoại</h5></td>
            <td colspan="2"><input type="text" name ="tt_sdt" value="<?php echo $row["sdt"]; ?>"></td>
        </tr>
        <tr>
            <td><h5>Địa chỉ liên lạc:</h5></td>
            <td colspan="2"><input type="text" name ="tt_diachi" value="<?php echo $row["dia_chi"]; ?>"></td>
        </tr>
        <tr>
            <td colspan="3"><input class="sub" type="submit" name="tt_submit" value="Cập nhật"></td>
        </tr>

        
    </form>  
        <?php ?>  
</table>
</div>
</div>

    