     

            <!-- CONTENT -->
            <div class="content" > 
                <?php include("subPage/fail.php"); ?>
                <form method="post" action="index.php?a=checkout.php" >
                    <fieldset>
                        <legend>Thông tin giao hàng</legend>               
                        <?php 
                        if(isset($_SESSION["username"]))
                        {
                            $name = $_SESSION["username"];
                            $query = "SELECT * FROM user u, thong_tin_user tt WHERE username = '$name' and u.id = tt.id";
                            $result = mysqli_query($db, $query);
                            if(mysqli_num_rows($result) > 0)
                            {
                                $row = mysqli_fetch_array($result); ?>
                                <input type="hidden" name = "txtID" value="<?php echo $row["id"];?>">
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
                                <tr>
                                <tr>
                                    <td colspan="2" align="right"><input type="submit" name="c_submit_a" class="sub" value="Đặt hàng" ></td>
                                </tr>
                                </table>
                                <?php
                            }
                        else{                                                    
                         ?>
                            <table class="tblCheckOutInfo" align = "center">                 
                            <!-- Name -->
                            <tr>
                                <td><b>Họ và tên:<b></td>
                                <td>
                                    <input type="text" name="txtFullname" id="txtFullname" require>
                                </td>
                            </tr>
                            <!-- Email -->
                            <tr>
                                <td><b>Email:</b></td>
                                    <td>
                                        <input type="email" name="txtEmail" id="txtEmail" require>
                                    </td>
                                </tr>
                            </tr>
                            <!-- Phone -->
                            <tr>
                                <td><b>Số điện thoại:</b></td>
                                    <td>
                                        <input type="text" name="txtPhone" id="txtPhone" require>
                                    </td>
                                </tr>
                            </tr>
                            <!-- Address -->
                            <tr>
                                <td><b>Địa chỉ:</b></td>
                                    <td>
                                        <textarea name="txtAddress" id="txtAddress" cols="22" rows="5"></textarea>
                                    </td>
                                </tr>
                            </tr>
                            <tr>
                                <td colspan="2" align="right"><input type="submit" name="c_submit_b" class="sub" value="Đặt hàng" ></td>
                            </tr>
                        <?php  } ?>
                        
                    </table>
                         <?php
                        }
                         else
                         {
                            echo "<h4>Bạn phải đăng nhập để sử dụng giỏ hàng</h4>";
                         }
                        
                         ?>
               </form>      
                    </fieldset>
                    
               <hr>
                        <!-- Cart -->
                    <fieldset>
                        <legend >Giỏ hàng của bạn:</legend>
                        <?php include("subPage/product.php"); ?>
                    </fieldset>
