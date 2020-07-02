

     <ul id="navigate">
                <li class="active"><a href="index.php?a=index01.php">Trang chủ</a></li>
                <li><a href="#s1">Sản phẩm</a>
                    <span id="s1"></span>
                    <ul class="subs">
                        <li><a href="#">Loại</a>
                            <ul>
                                <li> <a href="index.php?a=itemSort.php&pid=Lap">Laptop</a></li>
                                <li><a href="index.php?a=itemSort.php&pid=HP">Tai nghe</a></li>
                                <li><a href="index.php?a=itemSort.php&pid=KB">Bàn phím</a></li>
                                <li><a href="index.php?a=itemSort.php&pid=Mse">Chuột</li>
                                <li><a href="index.php?a=itemSort.php&pid=Moni">Màn hình</a></li>
                                <li><a href="index.php?a=itemSort.php&pid=PC">Máy tính</a></li>
                            </ul>
                        </li>                     
                    </ul>
                </li>
                <li><a href="#s1">Nhà sản xuất</a>
                    <span id="s1"></span>
                    <ul class="subs">
                        <li>
                            <ul>
                                <?php 
                                    $query = "SELECT distinct hangsx FROM product order by hangsx LIMIT 0,13 ";
                                    $res = mysqli_query($db,$query);
                                    if(mysqli_num_rows($res)>0):
                                        while($row = mysqli_fetch_array($res)):
                                ?>
                                    <li><a href="index.php?a=itemSort.php&hsx=<?php echo $row["hangsx"] ?>"><?php echo $row["hangsx"]; ?></a></li>
                                <?php
                                        endwhile;
                                    endif;
                                ?>
                            </ul>
                            
                         </li>
                         <li>
                             <ul>
                             <ul>
                                <?php 
                                    $query = "SELECT distinct hangsx FROM product order by hangsx LIMIT 13,100 ";
                                    $res = mysqli_query($db,$query);
                                    if(mysqli_num_rows($res)>0):
                                        while($row = mysqli_fetch_array($res)):
                                ?>
                                    <li><a href="index.php?a=itemSort.php&hsx=<?php echo $row["hangsx"] ?>"><?php echo $row["hangsx"]; ?></a></li>
                                <?php
                                        endwhile;
                                    endif;
                                ?>
                            </ul>
                             </ul>       
                         </li>  
                    </ul>           
                </li>
                <li><a href="index.php?a=about.php">Giới thiệu</a></li>
                <li><a href="index.php?a=contact.php">Liên hệ</a></li>
                <?php if(!isset($_SESSION["username"])): ?>
                    <li><a href="index.php?a=login.php">Đăng nhập</a></li>               
                <?php else : ?>
                    <li><a href="index.php?a=thong_tin_CN.php">Xin chào <strong> <?php echo $_SESSION['username']; ?></strong></a></li>
                    <li><a style="float: right;" href="index.php?a=login.php&logout='1'">Đăng xuất</a></li>
                <?php endif; ?>
                <li><a href="index.php?a=checkout.php" class="fa">&#xf07a;</a></li>
                <li style="color: #FC2121;"><?php include("subPage/numberCartItem.php");?></li>
                
            </ul>



