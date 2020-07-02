
 <!-- PHAN TRANG -->
<?php 
    // Đếm số lượng trang
    $query = "SELECT COUNT(id) AS total FROM product";
    if(isset($_GET["pid"]))
    {
        $item = $_GET["pid"];
        $query = "SELECT COUNT(id) AS total FROM product WHERE id like '$item%'";
    }
    if(isset($_POST["GT_submit"]))
    {
        if(isset($_POST["txtMin"]) && isset($_POST["txtMax"]))
        {
            $min = $_POST["txtMin"];
            $max = $_POST["txtMax"];  
            $query = "SELECT COUNT(id) AS total FROM product WHERE price > $min and price < $max";
            $result = mysqli_query($db,$query);
            if($min != null && $max != null)
            {
                $query = "SELECT COUNT(id) AS total FROM product WHERE price > $min and price < $max ";
                $result = mysqli_query($db,$query);
            }         
            else if($min != null && $max == null)
            {
                $query = "SELECT COUNT(id) AS total FROM product WHERE price > $min";
                $result = mysqli_query($db,$query);
            }  
            else if($min == null && $max != null)
            {
                $query = "SELECT COUNT(id) AS total FROM product WHERE price < $max";
                $result = mysqli_query($db,$query);
            }  
            else
            {
                echo '<a href="index.php?a=index01.php">Không có kết quả. Mời bạn nhấp vào đây!</a>';
                die();
            }
        }
    }
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
                if(isset($_GET["pid"]))
                {
                        $item = $_GET["pid"];
                        $item_check = "SELECT * FROM product WHERE id like '$item%' LIMIT $start, $limit";
                        $result = mysqli_query($db, $item_check);
                }
                else if(isset($_GET["hsx"]))
                {
                    $item = $_GET["hsx"];
                    $item_check = "SELECT * FROM product where hangsx = '$item'";
                    $result = mysqli_query($db, $item_check);
                }
                else if(isset($_POST["GT_submit"]))
                {
                    if(isset($_POST["txtMin"]) && isset($_POST["txtMax"]))
                    {
                        $min = $_POST["txtMin"];
                        $max = $_POST["txtMax"];   
                        $query = "SELECT * FROM product";
                        $result = mysqli_query($db,$query);
                        if($min != null && $max != null)
                        {
                            $query = "SELECT * FROM product WHERE price > $min and price < $max LIMIT $start, $limit";
                            $result = mysqli_query($db,$query);
                        }                    
                        else if($min != null && $max == null)
                        {
                            $query = "SELECT * FROM product WHERE price > $min LIMIT $start, $limit";
                            $result = mysqli_query($db,$query);
                        }  
                        else if($min == null && $max != null)
                        {
                            $query = "SELECT * FROM product WHERE price < $max LIMIT $start, $limit";
                            $result = mysqli_query($db,$query);
                        }  
                       
                    }
                }
                else if(isset($_POST["tk_submit"]))	// TÌM KIẾM                
                {                    
                    $tk = $_POST["txt_tk"];
                    $query = "SELECT *
                    FROM product
                    WHERE id like '%$tk%' or productname like '%$tk%' or hangsx like '%$tk%' or price like '%$tk%' or ngay_nhan like '%$tk%'";
                    $result = mysqli_query($db,$query);                  
                }
                else if(isset($_POST["cb_submit"])) //LOC
                {
                    $query = "SELECT * FROM product WHERE 1 and";
                    if(!empty($_POST["check"]))
                    {
                        $flag = 0;
                        foreach($_POST["check"] as $check)
                        {   
                            if($flag == 0)
                            {
                                $query .= " loai = '$check'";
                            }
                            else{
                                $query .= " or loai = '$check'";            
                            }
                            $flag++;     
                        }                       
                    }
                    $result = mysqli_query($db, $query);
                }
                    if(mysqli_num_rows($result) > 0):
                        while($row = mysqli_fetch_array($result)):                          
                ?>
                <!-- '{' -->
                <a href="index.php?a=info.php&i_id=<?php echo $row['id'];?>">
                    <div class="box">
                            <form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>&a=ItemSort.php&pid=<?php echo $item; ?>">
                                    <img src="img_product/<?php echo $row["img"];?>"/>
                                    
                                    <div class="name" ><?php echo $row["productname"]; ?></div>

                                    <div class="price" ><?php echo number_format($row["price"]); ?>đ</div>

                                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>" />

                                    <input type="hidden" name="hidden_name" value="<?php echo $row["productname"]; ?>" />

                                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

                                    <input type="submit" name="shopping_cart" style="margin-top:5px;" class="sub" value="Add to Cart" />
                            </form>
                        </div>
                </a>
                      <!-- '}' -->
                <?php
                        endwhile;                       
                    endif;
                ?>
      <?php 
      ?>
                

            </div>
<!-- DẤU TRANG -->
<div class="So_trang" style="clear: both;">
        <?php 
            //Nút quay lại
            if ($current_page > 1 && $total_page > 1)
            {
                if(isset($item))
                {
                    echo '<a href="index.php?a=itemSort.php&pid='.$item.'&page='.($current_page-1).'">Prev</a> | ';
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
                    else
                    {
                        if(isset($item))
                        {
                            echo '<a href="index.php?a=itemSort.php&pid='.$item.'&page='.$i.'">'.$i.'</a> | ';
                        }
                        if(isset($min)|| isset($max))
                        {
                            echo '<a href="index.php?a=itemSort.php&page='.$i.'">'.$i.'</a> | ';
                        }
                    }
                }

            //Nút next
            if ($current_page < $total_page && $total_page > 1)
            {
                if(isset($item))
                {
                    echo '<a href="index.php?a=itemSort.php&pid='.$item.'&page='.($current_page+1).'">Next</a>';
                }
                if(isset($min)|| isset($max))
                {
                    echo '<a href="index.php?a=itemSort.php&page='.($current_page+1).'">Next</a>';
                }
            }
        ?>
    </div>   