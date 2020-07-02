<!-- PHAN TRANG -->
<?php 
    // Đếm số lượng trang
    $query = "SELECT COUNT(id) AS total FROM product";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $total_item = $row['total']; //Biến chứa số trang

    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;   //Trang hiện hành
    //Giới hạn số sản phẩm trên trang hiện hành
    $limit = 12;
    // Tính tổng số trang
    $total_page = ceil($total_item / $limit);

    //Trang hiện hành không thể quá tổng và không thể nhỏ hơn 1
    if ($current_page > $total_page)
    {
        $current_page = $total_page;
    }
    else if ($current_page < 1)
    {
        $current_page = 1;
    }

    //Start là vị trí của giá trị đầu tiên trong trang mới
    $start = ($current_page - 1) * $limit;
?>
            <!-- PRODUCT LIST -->
            <div class="content">  
                                     
                <?php
                    $query = "SELECT * FROM product LIMIT $start, $limit";
                    $result = mysqli_query($db, $query);
                    if(isset($_GET["sx"]))
                    {
                        $sx = $_GET["sx"];
                        if($sx == "tangDan")
                        {
                            $query = "SELECT * FROM product ORDER BY price ASC LIMIT $start, $limit";
                            $result = mysqli_query($db, $query);
                        }
                        else if($sx == "giamDan")
                        {
                            $query = "SELECT * FROM product ORDER BY price DESC LIMIT $start, $limit";
                            $result = mysqli_query($db, $query);
                        }
                        else if($sx == "xemNhieu")
                        {
                            $query = "SELECT * FROM product ORDER BY luot_xem DESC LIMIT $start, $limit";
                            $result = mysqli_query($db, $query);
                        }
                        else if($sx == "moiNhat")
                        {
                            $query = "SELECT * FROM product ORDER BY ngay_nhan DESC LIMIT $start, $limit";
                            $result = mysqli_query($db, $query);
                        }
                    }
                        if(mysqli_num_rows($result) > 0):                   
                            while($row = mysqli_fetch_array($result)):
                ?>
                <!-- '{' -->
                <a href="index.php?a=info.php&i_id=<?php echo $row['id'];?>">
                    <div class="box">
                            <form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">
                                    <img src="img_product/<?php echo $row["img"];?>"/>
                                    
                                    <div class="name" ><?php echo $row["productname"]; ?></div>

                                    <div class="price" ><?php  echo number_format($row['price'], 0); ?>đ</div>

                                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>" />

                                    <input type="hidden" name="hidden_name" value="<?php echo $row["productname"]; ?>" />

                                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

                                    <input type="submit" name="shopping_cart" style="margin-top:5px;" class="sub" value="Add to Cart" />
                            </form>
                        </div>
                </a>

                <?php
                       endwhile;
                   endif;
                ?>
        </div>
<!-- DẤU TRANG -->
<div class="So_trang" style="clear: both;">
        <?php 
            //Nút quay lại
            if ($current_page > 1 && $total_page > 1)
            {
                if(isset($sx))
                {
                    echo '<a href="index.php?a=index01.php&sx='.$sx.'&page='.($current_page-1).'">Prev</a> | ';
                }
                else
                {
                    echo '<a href="index.php?page='.($current_page-1).'">Prev</a> | ';
                }
            }

            //Trang
            for ($i = 1; $i <= $total_page; $i++){
                    // Nếu là trang hiện tại thì hiển thị thẻ span
                    // ngược lại hiển thị thẻ a
                    if ($i == $current_page)
                    {
                        echo '<span style="color: red;">' . $i . '</span> | ';
                    }
                    else if(isset($sx))
                    {
                        echo '<a href="index.php?a=index01.php&sx='.$sx.'&page='.$i.'">'.$i.'</a> | ';
                    }
                    else
                    {
                        echo '<a href="index.php?page='.$i.'">'.$i.'</a> | ';
                    }
                }

            //Nút next
            if ($current_page < $total_page && $total_page > 1)
            {
                if(isset($sx))
                {
                    echo '<a href="index.php?a=index01.php&sx='.$sx.'&page='.($current_page+1).'">Next</a> | ';
                }
                else
                {
                    echo '<a href="index.php?page='.($current_page+1).'">Next</a>';
                }
                
            }
        ?>
    </div>       
                
         