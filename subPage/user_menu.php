<?php 
        $username = $_SESSION["username"];
            $query_1 = "SELECT * FROM user WHERE username = '$username'";
            $result_1 = mysqli_query($db, $query_1);
            $row_1 = mysqli_fetch_array($result_1);
            $id = $row_1["id"];
?>

<div class="user_menu">
                <button class="hvr-box-shadow-inset" onclick="location.replace('index.php?a=thong_tin_CN.php')">Thông tin cá nhân</button> 
                <button  class="hvr-box-shadow-inset" onclick="location.replace('index.php?a=thong_tin_CNUp.php&id=<?php echo $id; ?>')">Cập nhật thông tin cá nhân</button> 
                <button  class="hvr-box-shadow-inset" onclick="location.replace('index.php?a=thong_tin_MK.php&id=<?php echo $id; ?>')">Đổi mật khẩu</button> 
       
            </div>