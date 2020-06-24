<div class="ctrProduct">                                 

    <?php
                    $i_id = $_GET['i_id'];
                    $query = "SELECT pd.*, ct.* 
                            FROM ctsanpham ct, product pd
                            WHERE pd.id = ct.id and pd.id = '$i_id'";        
                    $result = mysqli_query($db, $query);
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
    ?>
         <table>
             <form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">
                    <tr>
                        <td class="td-product-left">
                            <img id="mainImg" src="./img_product/<?php echo $row['img']; ?>">
                            <td class="td-product-slide-left">
                                    <img class="gallery-img" onmouseover="document.getElementById('mainImg').src='./img_product/<?php echo $row['img']; ?>'" src="./img_product/<?php echo $row['img']; ?>" >
                                    <img class="gallery-img" onmouseover="document.getElementById('mainImg').src='./img_product/<?php echo $row['img_2']; ?>'" src="./img_product/<?php echo $row['img_2']; ?>">
                                    <img class="gallery-img" onmouseover="document.getElementById('mainImg').src='./img_product/<?php echo $row['img_1']; ?>'" src="./img_product/<?php echo $row['img_1']; ?>">
                            </td>                       
                        </td>
                        <td class="td-product-right">
                            <!-- Tên sản phẩm -->
                            <div class="product-name" style="font-size:32px"><?php echo $row['productname']; ?></div>
                            <table class="table-buy-detail">
                                <!-- Giá bán -->
                                <tr>
                                    <th class="product-price" style="font-size:30px; color:blue; text-align: left;">Giá bán:</th>
                                    <td class="product-price-value" style="font-size:35px;"><?php echo number_format($row['price'], 0); ?><sup style="font-size:25px"> đ</sup></td>
                                </tr>
                                <!-- Giảm giá -->
                                <tr>
                                    <th class="product-discount" style="font-size:20px; text-align: left;">Giảm giá:</th>
                                    <td class="product-discount-value" style="font-size:20px; font-style:italic;"><?php echo $row['giam_gia']; ?>%</td>
                                </tr>
                                <!-- Giao hàng -->
                                <tr>
                                    <th class="product-ship-icon" style="text-align:left">
                                        <img src="./img/delivery.png" width="50px">
                                    </th>
                                    <td class="product-ship-value" style="font-style:italic; font-size:23px;">Giao hàng miễn phí</td>
                                </tr>
                                <!-- Số lượng -->
                                <tr>
                                    <th class="product-quality" style="text-align:left; font-size:20px;">Số lượng:</th>
                                    <td class="prodcut-quality-box">
                                        <div class="quality-box">
                                            <input class="quality-input" type="number"
                                             value="1" title="Số lượng" >
                                        </div>
                            </td>
                                </tr>
                                <!-- Nút mua hàng -->
                                <tr>
                                    <th class="product-button-buy" style="text-align:left">                                     
                                             <input type="hidden" name="id" value="<?php echo $row["id"]; ?>" />

                                            <input type="hidden" name="hidden_name" value="<?php echo $row["productname"]; ?>" />

                                            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
                                            <input type="submit" class="sub" name="shopping_cart" value="Mua hàng" style="width:100px; height:40px; font-size:15px;">
                                    </th>
                                </tr>
                            </table> 
                        </form>                          
                        </td>
                    </tr>                   
                </table>
                <!-- MÔ TẢ -->
                <div style="overflow: hidden; margin-bottom: 10px;">
                    <div class="describe-product">
                        <span>
                            <p>Mô tả ngắn:</p>
                        </span>
                        <?php echo $row['mo_ta']; ?> 
                    </div>
                    <!-- Thương hiệu, đánh giá, bình luận -->
                    <div class="brand-rv-cmt">
                        <ul>
                            <li><a href="#">Thương hiệu</a></li>
                            <li>|</li>
                            <li><a href="#">Đánh giá</a></li>
                            <li>|</li>
                            <li><a href="#">Bình luận</a></li>
                        </ul>
                        <p>
                                <?php echo $row['gioi_thieu']; ?>
                        </p>
                    </div>
                </div>
                <!-- PHAN NAY CAP NHAT SAU -->

                 <!-- Gợi ý sản phẩm tương tự -->
                <div class="similar-product">                   
                        <marquee direction="up" scrollamount="2">
                        <ul>
                            <script type="text/javascript">
                                farbbibliothek = new Array();
                                farbbibliothek[0] = new Array("#FF0000","#FF4000","#FF8000","#FFC000","#FFFF00","#C0FF00","#80FF00","#40FF00","#00FF00","#00FF40","#00FF80","#00FFC0","#00FFFF","#00C0FF","#0080FF","#0040FF","#0000FF","#4000FF","#8000FF","#C000FF","#FF00FF","#FF00C0","#FF0080","#FF0040");
                                farbbibliothek[1] = new Array("#FF0000","#FF4000","#FF8000","#FFC000","#FFFF00","#C0FF00","#80FF00","#40FF00","#00FF00","#00FF40","#00FF80","#00FFC0","#00FFFF","#00C0FF","#0080FF","#0040FF","#0000FF","#4000FF","#8000FF","#C000FF","#FF00FF","#FF00C0","#FF0080","#FF0040");
                                farbbibliothek[2] = new Array("#FF0000","#FF4000","#FF8000","#FFC000","#FFFF00","#C0FF00","#80FF00","#40FF00","#00FF00","#00FF40","#00FF80","#00FFC0","#00FFFF","#00C0FF","#0080FF","#0040FF","#0000FF","#4000FF","#8000FF","#C000FF","#FF00FF","#FF00C0","#FF0080","#FF0040");
                                farbbibliothek[3] = new Array("#FF0000","#FF4000","#FF8000","#FFC000","#FFFF00","#C0FF00","#80FF00","#40FF00","#00FF00","#00FF40","#00FF80","#00FFC0","#00FFFF","#00C0FF","#0080FF","#0040FF","#0000FF","#4000FF","#8000FF","#C000FF","#FF00FF","#FF00C0","#FF0080","#FF0040");
                                farbbibliothek[4] = new Array("#FF0000","#FF4000","#FF8000","#FFC000","#FFFF00","#C0FF00","#80FF00","#40FF00","#00FF00","#00FF40","#00FF80","#00FFC0","#00FFFF","#00C0FF","#0080FF","#0040FF","#0000FF","#4000FF","#8000FF","#C000FF","#FF00FF","#FF00C0","#FF0080","#FF0040");
                                farbbibliothek[5] = new Array("#FF0000","#FF4000","#FF8000","#FFC000","#FFFF00","#C0FF00","#80FF00","#40FF00","#00FF00","#00FF40","#00FF80","#00FFC0","#00FFFF","#00C0FF","#0080FF","#0040FF","#0000FF","#4000FF","#8000FF","#C000FF","#FF00FF","#FF00C0","#FF0080","#FF0040");
                                farbbibliothek[6] = new Array("#FF0000","#FF4000","#FF8000","#FFC000","#FFFF00","#C0FF00","#80FF00","#40FF00","#00FF00","#00FF40","#00FF80","#00FFC0","#00FFFF","#00C0FF","#0080FF","#0040FF","#0000FF","#4000FF","#8000FF","#C000FF","#FF00FF","#FF00C0","#FF0080","#FF0040");
                                farben = farbbibliothek[4];
                                function farbschrift(){for(var b=0;b<Buchstabe.length;b++){document.all["a"+b].style.color=farben[b]}farbverlauf()}function string2array(b){Buchstabe=new Array();while(farben.length<b.length){farben=farben.concat(farben)}k=0;while(k<=b.length){Buchstabe[k]=b.charAt(k);k++}}function divserzeugen(){for(var b=0;b<Buchstabe.length;b++){document.write("<span id='a"+b+"' class='a"+b+"'>"+Buchstabe[b]+"</span>")}farbschrift()}var a=1;function farbverlauf(){for(var b=0;b<farben.length;b++){farben[b-1]=farben[b]}farben[farben.length-1]=farben[-1];setTimeout("farbschrift()",30)}var farbsatz=1;function farbtauscher(){farben=farbbibliothek[farbsatz];while(farben.length<text.length){farben=farben.concat(farben)}farbsatz=Math.floor(Math.random()*(farbbibliothek.length-0.0001))}setInterval("farbtauscher()",5000);
                                text= "Sản phẩm tương tự và các sản phẩm có cùng thương hiệu"; //h
                                string2array(text);
                                divserzeugen();
                                </script>
                        </ul>
                        </marquee>
                <!-- Gợi ý sản phẩm tương tự -->
                 <?php $query_1 = "SELECT * FROM product ORDER BY RAND() LIMIT 5"; 
                        $kq = mysqli_query($db,$query_1);
                        if(mysqli_num_rows($kq) > 0){
                            while ($prd = mysqli_fetch_array($kq)){ ?>
                        <div class="boxx" align="center">
                            <a href="index.php?a=info.php&i_id=<?php echo $prd['id']; ?>">
                                <img src="img_product/<?php echo $prd['img'] ?>">
                                <div class="sml_name" style="color:blue"><?php echo $prd['productname'];?></div>
                                <div class="sml_price" style="color:red">Giá: <?php echo number_format($prd['price'],0); ?>đ</div>
                            </a>
                        </div>
                            <?php } ?>
                      <?php } ?>
                </div>
                     <!-- Chi tiết sản phẩm -->
                <table class="table-product-detail">
                        <!-- table head -->
                        <thead>
                            <tr> 
                                <th class=info-th>Thông tin chi tiết</th>
                                <th class=info-th>Cấu hình chi tiết</th>
                            </tr>
                        </thead>
                        <!-- table body -->
                        <tbody>
                            <tr>
                                    <td class="td-left" width="600px">
                                        <p>
                                            <img src="img_product/<?php echo $row['img_1']; ?>" width="500px">
                                        </p>
                                        <h2 class="product-detali-name"><?php echo $row["productname"]; ?></h2>
                                            <p>
                                               <?php echo $row['chi_tiet']; ?>
                                            </p>
                                            <img src="img_product/<?php echo $row['img_2']; ?>" width="500px">
                                             <p>
                                                <?php echo $row["chi_tiet_1"]; ?>
                                            </p>
                                    </td>

                                    <td class="td-right" width= 300px>
                                        <table class="tb-in-td">
                                            <tr>
                                                <th class="td-label">Bảo hành:</th>
                                                <td class="td-value"><?php echo $row['bao_hanh']; ?> tháng</td>
                                            </tr>
                                            <tr>
                                                <th class="td-label">Thương hiệu:</th>
                                                <td class="td-value"><?php echo $row['thuong_hieu']; ?></td>
                                            </tr>
                                            <tr>
                                                <th class="td-label">Label:</th>
                                                <td class="td-value"><?php echo $row['label']; ?></td>
                                            </tr>
                                            <tr>
                                                <th class="td-label">Màu sắc:</ th>
                                                <td class="td-value"><?php echo $row['mau_sac']; ?></td>
                                            </tr>
                                            <tr>
                                                <th class="td-label">Loại kết nối</th>
                                                <td class="td-value"><?php echo $row['loai']; ?></td>
                                            </tr>
                                            <tr>
                                                <th class="td-label">Tương thích</th>
                                                <td class="td-value"><?php echo $row['tuong_thich']; ?></td>
                                            </tr>
                                        </table>
                                    </td>
                            </tr>
                            
                        </tbody>
                        
    
                    </table>
</div>
    <?php
                            }
                        }
                        else
                        {
    ?>
                            <h2>Sản phẩm hiện chưa có thông tin</h2>
    <?php                        
                        }
    ?>

