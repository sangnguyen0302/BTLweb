<?php
    session_start();
?>

<?php require  '../views/inc/head.php';
require  '../models/cartModel.php';
require '../DB.php';
 ?>


<?php
    if(isset($_SESSION['cart'])&&count($_SESSION['cart'])!=0){
        $css = "cart active";
        $css2 = "cart";
    }else{
        $css ="cart";
        $css2="cart active";
    }
?>
<div class="<?php echo $css2; ?>">
    <h2>Giỏ hàng đang rỗng</h2>
    <br>
    <div class="cart2 active"><a href="trangchu.php>">Quay lại</a></div>
    
</div>
<div class="<?php echo $css; ?>">
    <table>
        <tr>
            <th> Sản phẩm </th>
            <th> Tên </th>
            <th> Số lượng </th>
            <th> Giá tiền</th>
            <th> Tổng giá sản phẩm </th>
            <th> Xóa </th>
        </tr>
        <!-- Cart items nr -->
        <tr>
			<td class="cart-items" colspan="6">
                Cart Items <span> <?php echo CategoryModel::getNumberCart()?></span>
            </td>
		</tr>
        <?php
        foreach($_SESSION['cart'] as $value){
            ?>
                <tr> <!-- The product html template -->
				<td><img src="<?php echo "../../image/".$value['image']?>"></td>
				<td><?php echo $value['name']?></td>
				<td>
                    <form action="../controllers/script.php" method="get">
                        <span>Quantity</span>
                        <input type="text" name="quantity" value="<?php echo $value['status']?>"/>

                        <input type="hidden" name="product-id" value="<?php echo $value['id']?>"/>

                        <input type="submit" name="quantity-update" value="Thay đổi"/>
                    </form>
                </td>
				<td><?php echo number_format($value['originalPrice'],2)."VND"?></td>
				<td><?php echo number_format($value['originalPrice']*$value['status'],2)?></td>
				<td><a href="../controllers/script.php?remove-product-id=<?php echo $value['id'];?>">Remove</a></td>
			    </tr>
            <?php
        }
        ?>
			

			<tr> <!-- The total sum -->
				<td class="total-price" colspan="6">Total Price
                    <span>
                        <?php echo number_format(CategoryModel::getTotalPrice(),2)?>
                    </span>
                </td>
			</tr>

			<tr> <!-- The clear cart button -->
				<td class="clear-cart" colspan="6"> <a href="../controllers/script.php?clear-cart">Dọn dẹp giỏ hàng</a> </td>
			</tr>
    </table>
</div>