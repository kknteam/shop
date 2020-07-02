<!-- Sidebar ================================================== -->
<div id="sidebar" class="span3">
<?php if(!empty($_SESSION["cart"]))
{
  $total = 0;
  foreach ($_SESSION["cart"] as $key => $item_list)
  {
    $total = $total + ($item_list["quantity"] * $item_list["price"]); 
	}
} ?>
		<div class="well well-small"><a id="myCart" href="product_summary.php"><img src="themes/images/ico-cart.png" alt="cart"><?php include("subPage/numberCartItem.php") ?> Item(s)  <span class="badge badge-warning pull-right">
      <?php echo ((isset($_SESSION["cart"]) && !empty($_SESSION["cart"]))? number_format($total) : 0); ?>đ</span></a></div>
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
			<li class="subMenu open"><a href="#"> Tìm kiếm theo giá tiền</a>
				<div  class="giaTien">
					<div id="content">
						<form action="index.php?a=itemSort.php" method="POST">
								<input type="number" name="txtMin" placeholder="Từ">
								<i class="icon-chevron-right"></i>
								<input type="number" name="txtMax" placeholder="Đến">
								<button type="submit" name="GT_submit">GO</button>
						</form>
					</div>						
				</div>
			</li>
			<li class="subMenu"><a href="#"> Tìm kiếm </a>
			<ul style="display:none">
				<li>
					<form action="index.php?a=itemSort.php" method="POST">
							<label>Nhập nội dung:</label>
							<input type="text" name="txt_tk" style="height: 25px;" placeholder="search...">
							<button type="submit" name="tk_submit" class="sub">Tìm</button>
					</form>
				</li>												
			</ul>
			</li>
			<li class="subMenu"><a href="#"> Sắp xếp theo </a>
			<ul style="display:none">
				<li>
					<form>
							<label>Sắp xếp theo:</label>
							<select class="sapXep">
									<option value="neutral"></option>
									<option value="tangDan">Giá tiền tăng dần</option>
									<option value="giamDan">Giá tiền giảm dần</option>
									<option value="xemNhieu">Xem nhiều nhất</option>
									<option value="moiNhat">Mới nhất</option>
							</select>
					</form>
				</li>												
			</ul>
			</li>
			<li class="subMenu"><a href="#">Sản phẩm</a>
			<ul style="display:none">
				<form action="index.php?a=itemSort.php" method="POST">
						<li><input type="checkbox" value="Laptop" name="check[]">Laptop</li>
						<li><input type="checkbox" value="Tai nghe" name="check[]">Tai nghe</li>
						<li><input type="checkbox" value="Chuot" name="check[]">Chuột</li>
						<li><input type="checkbox" value="Ban phim" name="check[]">Bàn phím</li>
						<li><input type="checkbox" value="PC" name="check[]">Máy tính</li>
						<li><input type="checkbox" value="Man hinh" name="check[]">Màn hình</li>
						<li><input type="submit" name="cb_submit" value="Lọc" class="sub"></li>
				</form>
       </ul>
			</li>
			
			
		</ul>
		<br/>
		  <div class="thumbnail">
				<img src="img_product/Moni02.jpg" alt="LCD"/>
				<div class="caption">
					<h5>LCD Asus 34</h5>
					<h4 style="text-align:center"><a class="btn" href="index.php?a=info.php&i_id=Moni02"> <i class="icon-zoom-in"></i></a> <a class="btn" href="index.php?action=add&id=Moni02">Thêm vào <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">30.000.000đ</a></h4>
				</div>
		  </div><br/>
			<div class="thumbnail">
					<img src="img_product/KB06.jpg" title="Bootshop New Kindel" alt="Bootshop Kindel">
					<div class="caption">
				  	<h5>Fuhlen Destroyer</h5>
				    	<h4 style="text-align:center"><a class="btn" href="index.php?a=info.php&i_id=KB06"> <i class="icon-zoom-in"></i></a> <a class="btn" href="index.php?action=add&id=KB06">Thêm vào<i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">900.000đ</a></h4>
					</div>
			  </div><br/>
			<div class="thumbnail">
				<img src="themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
				<div class="caption">
				  <h5>Payment Methods</h5>
				</div>
			  </div>
	</div>
<!-- Sidebar end=============================================== -->
