<div class="ptrProduct">
	
	<!-- SP mới -->
	
	<h2 align="center">Đăng ký sản phẩm mới</h2>
	<hr>
	<h3 align="center">Sản phẩm</h3>
	<div class="p_table">
		<form method="POST" action="index.php?a=ql_sanPham.php">
			<?php ?>
			<table>
				<tr>
					<td>ID:</td>
					<td><input type="text" name="pID"></td>
				</tr>
				<tr>
					<td>Tên sản phẩm:</td>
					<td><input type="text" name="pName"></td>
				</tr>
				<tr>
					<td>Nhà sản xuất:</td>
					<td><input type="text" name="pNSX"></td>
				</tr>
				<tr>
					<td>Loaị:</td>
					<td><input type="text" name="loai"></td>
				</tr>
				<tr>
					<td>Giá thành:</td>
					<td><input type="text" name="pPrice"></td>
				</tr>
				<tr>
					<td>Tên file hình ảnh 1:</td>
					<td><input type="text" name="pImg1"></td>
				</tr>
				<tr>
					<td>Tên file hình ảnh 2:</td>
					<td><input type="text" name="pImg2"></td>
				</tr>
				<tr>
					<td>Tên file hình ảnh 3:</td>
					<td><input type="text" name="pImg3"></td>
				</tr>
				<tr>
					<td>Số lượng tồn:</td>
					<td><input type="number" name="slt"></td>
				</tr>
				
				<tr>
					<td colspan="2" align="right"><input type="submit" name="pSubmit" value="Đăng ký"></td>
				</tr>
			</table>
		</form>		
	</div>
	
	<hr>
	<h3 align="center">Chi tiết sản phẩm</h3>	
	<div class="p_table">
		<form method="POST" action="index.php?a=ql_sanPham.php">
			<table>
				<tr id="headline" style="background-color: #0C1C83; color: white; text-align: center;">
					<td colspan="2">MÃ SẢN PHẨM</td>
					<td colspan="2">THÔNG TIN CHI TIẾT</td>
				</tr>

				<tr>
					<td>ID_CT:</td>
					<td><input type="text" name="ctIDCT"></td>
					<!-- 0000000000000000000000000000 -->
					<td rowspan="3">Mô tả</td>
					<td rowspan="3"><textarea name="ctMoTa" cols="30" rows="10"></textarea></td>
					<!-- 0000000000000000000000000000 -->
				</tr>
								<tr>
					<td>ID:</td>
					<td>
						<select name="ctID">
								<?php 
								$query = "SELECT * FROM product";
								$result = mysqli_query($db,$query);
								if(mysqli_num_rows($result) > 0):
									while($row = mysqli_fetch_array($result)): ?>
							<option value="<?php echo $row["id"]; ?>"><?php echo $row["id"]; ?></option>
								<?php endwhile; endif; ?>
						</select>
					</td>					
				</tr>			
				<tr id="headline" style="background-color: #0C1C83; color: white; text-align: center;">
					<td colspan="2">THÔNG TIN CHUNG</td>
				</tr>
				<tr>
					<td>Giảm giá:</td>
					<td><input type="text" name="ctGGia"></td>
					<!-- 000000000000000000000000000 -->
					<td  rowspan="2">Giới thiệu</td>
					<td  rowspan="2"><textarea name="ctGThieu" cols="40" rows="10"></textarea></td>
					<!-- 000000000000000000000000000 -->
				</tr>				
				<tr>
					<td>Bảo hành:</td>
					<td><input type="text" name="ctBaoHanh"></td>
				</tr>
				<tr>
					<td>Thương hiệu:</td>
					<td><input type="text" name="ctThuongHieu"></td>
					<!-- 000000000000000000000000000 -->
					<td  rowspan="2">Chi tiết A</td>
					<td  rowspan="2"><textarea name="ctCTA" cols="40" rows="10"></textarea></td>
					<!-- 000000000000000000000000000 -->
				</tr>
				<tr>
					<td>Nhãn</td>
					<td><input type="text" name="ctNhan"></td>
				</tr>
				<tr>
					<td>Màu sắc</td>
					<td><input type="text" name="ctMau"></td>
					<!-- 0000000000000000000000000000 -->
					<td rowspan="3">Chi tiết B</td>
					<td rowspan="3"><textarea name="ctCTB" cols="40" rows="10"></textarea></td>
					<!-- 0000000000000000000000000000 -->
				</tr>
				<tr>
					<td>Loại</td>
					<td><input type="text" name="ctLoai"></td>
				</tr>
				<tr>
					<td>Tương thích</td>
					<td><input type="text" name="ctTuongThich"></td>
				</tr>

				<tr>
					<td colspan="4" align="right"><input type="submit" name="ctSubmit" value="Cập nhật"></td>
				</tr>
			</table>
		</form>		
	</div>

	<hr>				
	<h3 align="center">SẢN PHẨM TRONG KHO</h3>				
	<div  class="p_table">
		<table>
			<tr id="headline" style="background-color: #0C1C83; color: white;">
				<td></td>
				<td>ID sản phẩm</td>
				<td>Tên sản phẩm</td>
				<td>Giá thành</td>
				<td>Ngày nhận</td>
				<td>Số lượng tồn</td>
			</tr>
			<?php 
				$query = "SELECT * FROM product";
				$result = mysqli_query($db,$query);
				if(mysqli_num_rows($result) > 0):
					while($row = mysqli_fetch_array($result)): ?>
			<tr>
				<td><img src="img_product/<?php echo $row["img"]; ?>" width="40px" height="40px"></td>
				<td><?php echo $row["id"] ?></td>
				<td><?php echo $row["productname"] ?></td>
				<td><?php echo number_format($row["price"])?></td>
				<td><?php echo $row["ngay_nhan"] ?></td>
				<td><?php echo $row["sl_ton"]; ?></td>
			</tr>
			<?php endwhile; endif;  ?>
		</table>
	</div>

</div>