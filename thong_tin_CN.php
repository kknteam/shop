<div class="content">
<style>
    .tab {border-collapse:collapse;}
    .tab .first {border-bottom:1px solid #EEE;}
    .tab .second {border-top:1px solid #CCC;box-shadow: inset 0 1px 0 #CCC;}
</style>
<!-- MẶC ĐỊNH -->
<?php
    if(isset($_GET["action"]))
    {
        $name = $_SESSION["username"];
        $query = "SELECT * FROM user  WHERE username = '$name'";
        $result = mysqli_query($db, $query);
    }
?>
   
<?php 
        $username = $_SESSION["username"];
            $query_1 = "SELECT * FROM user WHERE username = '$username'";
            $result_1 = mysqli_query($db, $query_1);
            $row_1 = mysqli_fetch_array($result_1);
            $id = $row_1["id"];
?>
  <!-- Lấy thông tin cá nhân từ db -->
    <?php 
        $query = "SELECT * FROM user u, thong_tin_user tt WHERE username = '$username' and u.id = tt.id";
        $result = mysqli_query($db, $query);
        if(mysqli_num_rows($result) > 0)
        { 
            $row = mysqli_fetch_array($result);?>
             <?php include("subPage/user_menu.php") ?>
            <div class="user_info">
                <h1>THÔNG TIN CÁ NHÂN</h1>
                <table>
                    <tr>
                        <td>Họ tên: </td>
                        <td><?php echo $row["ten"];  ?> </td>
                    </tr>
                    <tr>
                        <td>Giới tính</td>
                        <td><?php echo $row["gioi_tinh"]; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $row["email"]; ?></td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td><?php echo  $row["sdt"]; ?></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td><?php echo $row["dia_chi"]; ?></td>
                    </tr>
                </table>
            </div>           
        <?php
        }
        else
        {
            include("subPage/user_menu.php");
            echo "<h3>Chưa có thông tin </h3></br>";
        }
        
    ?>    

   

</div>
