<?php if(!empty($_SESSION["cart"])): ?>
    <?php $total = 0; $i = 0?>

    <div class="p_table">
        <form action="checkout.php" method="POST">
             <table>
                <tr id="headline" style="background-color: #0C1C83; color: white;">
                    <td>Product name</td>              
                    <td>Quantity</td>
                    <td  style="text-align: center;">Action</td>
                </tr>
                
                    <?php foreach ($_SESSION["cart"] as $key => $item_list) : ?>
                <tr>    
                        <input type="hidden" name="id" value="<?php echo $item_list['id']; ?>">
                        <td><?php echo $item_list['productname']; ?></td>

                        <td> <input type="number" name="quantity" id="quantity" value="<?php echo $item_list['quantity']; ?>" onchange="updateSL(<?php echo $i; ?>)"></td>

                        <td style="text-align: center;"><a style=" text-decoration: none;"><a href="index.php?action=delete&id=<?php echo $item_list["id"]; ?>">Delete</a></td>
                </tr>
                    <?php $total = $total + ($item_list["quantity"] * $item_list["price"]); 
                            $i = $i + 1;?> 
                    <?php endforeach ?>
                <tr>
                     <td colspan="3" align="right"><input type="submit" name="cart_submit" value="Thanh toán"></td>
                </tr>
            </table>
        </form>    
    </div>  
<?php else : echo "Your shopping cart is empty"; ?>
<?php endif ?>
