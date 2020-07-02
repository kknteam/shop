<?php if(!empty($_SESSION["cart"])): ?>
	<?php $total = 0; ?>
	<div class="p_table">
		<table>
			<tr id="headline" style="background-color: #0C1C83; color: white;">
				<td>Mã sản phẩm</td>
				<td>Tên sản phẩm</td>
				<td>Giá thành</td>
				<td>Số lượng</td>
				<td colspan="2" style="text-align: center;">Thao tác</td>
			</tr>
			<form action="index.php?a=checkout.php" method="POST">			
				<?php foreach ($_SESSION["cart"] as $key => $item_list) : ?>
			<tr>	
					<td><?php echo $item_list['id'] ?></td>
					<td><?php echo $item_list['productname'] ?></td>
					<td><?php echo number_format( $item_list['price']); ?></td>
					<td><input type="number" name="Quantity[]" value="<?php echo $item_list['quantity'] ?>"></td>
					<td style="text-align: center;"><a style=" text-decoration: none;"><a href="index.php?a=checkout.php&action=delete&id=<?php echo $item_list["id"]; ?>">Xoá</a></td>
					
			</tr>
				<?php $total = $total + ($item_list["quantity"] * $item_list["price"]); 
						$_SESSION["total"] = $total;
				?> 
				<?php endforeach ?>
			<tr>
				<td colspan="2" align="right">Tổng tiền</td>
				<td colspan="2" align="left"> <?php echo number_format($total, 0); ?>đ</td>
				<td><input type="submit" name = "prd_submit" value="Cập nhật"></td>
			</tr>
			</form>
		</table>
		
	</div>	
<?php else : echo "Không có sản phẩm nào trong giỏ hàng của bạn"; ?>
<?php endif ?>
