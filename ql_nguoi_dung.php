<div class="ptrProduct">			
	<table class="p_table">
		<tr id="headline" style="background-color: #0C1C83; color: white;">
			<td>ID người dùng</td>
			<td>Loai Tk</td>
			<td>Tên đăng nhập</td>
			<td>Mật khẩu</td>
			<td>Email</td>
			<td>LS mua hàng</td>
			<td>Thao tác</td>
		</tr>
		<?php 
			$query = "SELECT * FROM user WHERE loai = 'U'";
			$result = mysqli_query($db,$query);
			if(mysqli_num_rows($result) > 0):
				while($row = mysqli_fetch_array($result)): ?>
		<tr>
			<td><?php echo $row["id"] ?></td>
			<td><?php echo $row["loai"]; ?></td>
			<td><?php echo $row["username"] ?></td>
			<td><?php echo $row["password"] ?></td>
			<td><?php echo $row["email"] ?></td>
			<td align="center"><a href="index.php?a=ql_nguoi_dung.php&id=<?php echo $row["id"]; ?>">xem</a></td>
			<td align="center"><a href="index.php?a=ql_nguoi_dung.php&action=u_del&id=<?php echo $row["id"]; ?>">Xoá</a></td>
		</tr>
		<?php endwhile; endif;  ?>
	</table>
	<br><br>
	<?php
	if(isset($_GET["id"]))
	{		
		$id = $_GET["id"];
	?>
	<div class="content">
		<div id="head">
			<h3>HOÁ ĐƠN MUA HÀNG</h3>
		</div>
		<!-- THÔNG TIN HOÁ ĐƠN -->
		<?php 
		$query = "SELECT DISTINCT hd.ngay_xuat, hd.tong_tien, tt.ten
		FROM hoa_don hd, user u,thong_tin_user tt
		WHERE u.id = hd.id_user and u.id = tt.id and u.id =  $id";
		$result = mysqli_query($db,$query);
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_array($result)): ?>
			<div id="body">
			<font style="font-weight: bold;">Tên khách hàng: <?php echo $row["ten"]; ?><br></font>
			<font style="font-weight: bold;">Ngày: <?php echo $row["ngay_xuat"]; ?><br></font>
				<!-- SẢN PHẨM -->
				<table class="p_table">
					<tr  id="headline" style="background-color: #0C1C83; color: white;">
						<td>Sản phẩm</td>		
						<td>Số lượng</td>
						<td>Giá thành</td>
					</tr>
				<?php 
				$day = $row["ngay_xuat"];
				$q = "SELECT DISTINCT p.productname, ct.so_luong, p.price
				FROM hoa_don hd, ct_hoadon ct, product p
				WHERE ct.id_product = p.id and ct.id_hoadon = hd.id and  hd.id_user = $id and hd.ngay_xuat = '$day'";
				$res = mysqli_query($db,$q);
				if(mysqli_num_rows($res)>0):
					while($r = mysqli_fetch_array($res)): ?>
					<tr>					
						<td><?php echo $r["productname"]; ?></td>
						<td><?php echo $r["so_luong"]; ?><br></td>
						<td><?php echo number_format($r["price"]);?></td>	
					</tr>			
				<?php endwhile; endif; ?>
				
				</table>
				<font style="font-weight: bold;">Tổng cộng: <?php echo number_format( $row["tong_tien"]); ?></font>
				<hr>
			</div>
			<?php endwhile;
			}
			else{
				echo "<h5>Khách hàng chưa thanh toán sản phẩm nào</h5>";
			}?>
	</div>	
	<?php
	}
	 ?>
	


</div>
