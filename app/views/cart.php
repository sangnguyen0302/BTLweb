<?php
    session_start();
    require_once  '../models/cartModel.php';
    require_once '../DB.php';
    require_once  '../views/inc/head.php';
?>
<script src="../../javascript/pmbtn.js"></script>
<title>Giỏ hàng</title>
</head>
<body>

<?php require_once 'inc/nav.php'; ?>

<!-- Bang BS-->
<div class="container my-5">
<h4>GIỎ HÀNG</h4>
<?php
    if(isset($_SESSION['cart'])&&count($_SESSION['cart'])!=0) { ?>
        <div class="table-responsive">
        <table class="table mb-5">
            <thead class="table-dark text-center align-middle">
            <tr>
                <th> Sản phẩm </th>
                <th> Tên </th>
                <th> Số lượng </th>
                <th> Đơn giá </th>
                <th> Thành tiền </th>
                <th> Xóa </th>
            </tr>
            </thead>
            <tbody class="text-center align-middle">
      
                <?php
                    foreach($_SESSION['cart'] as $value){
                ?>
                <tr> <!-- The product html template -->
				    <td><img src="<?php echo "../../image/".$value['image']?>" width="100px" height="100px"></td>
				    <td><?php echo $value['name']?></td>
				    <td>
                    <form action="../controllers/script.php" method="get">
                        <div class="input-group">
                            <span class="input-group-btn">
                            <button type="submit" name="quantity-update" class="btn btn-number" data-type="minus" data-field="<?= $value['id']?>">
                            <i class="fa-solid fa-minus"></i>
                            </button>
                            </span>
                        
                            <input type="text" name="quantity" id="<?= $value['id']?>" class="form-control input-number" value="<?php echo $value['status']?>" min="1" max="5" style="width:5px">

                            <span class="input-group-btn">
                            <button type="submit" name="quantity-update" class="btn btn-number" data-type="plus" data-field="<?= $value['id']?>">
                            <i class="fa-solid fa-plus"></i>
                            </button>
                            </span>
                        </div>
                        <input type="hidden" name="product-id" value="<?php echo $value['id']?>"/>
                    </form>
                    
                    </td>
				    <td><?php echo number_format($value['originalPrice'],2)."VND"?></td>
				    <td><?php echo number_format($value['originalPrice']*$value['status'],2)?></td>
				    <td><a class="text-danger" href="../controllers/script.php?remove-product-id=<?php echo $value['id'];?>"><i class="fa-solid fa-trash-can"></i></a></td>
                </tr>
                <?php
                }
                ?>

            <tr>
			    <td class="cart-items" colspan="6">
                    Cart Items <span> <?php echo CategoryModel::getNumberCart()?></span>
                </td>
	        </tr>

            <tr> <!-- The total sum -->
				<td class="total-price" colspan="6">Total Price
                    <span>
                        <?php echo number_format(CategoryModel::getTotalPrice(),2)?>
                    </span>
                </td>
			</tr>

			<tr> <!-- The clear cart button -->
				<td colspan="6"> <a href="../controllers/script.php?clear-cart" class="btn btn-danger">Dọn dẹp giỏ hàng</a> </td>
			</tr>
            </tbody>
        </table>
</div>

    <?php } else { ?>
         <div class="container-fluid text-center">
            <img src="https://www.english-learning.net/wp-content/uploads/2019/04/sorry-min.png" alt="Sorry" width="300px" heigt="300px" class="m-3">
            <h5>Giỏ hàng đang trống</h5>
            <a href="home.php" class="btn btn-dark">Quay lại</a>
         </div>
    <?php } ?>
</div>
    <?php require_once 'inc/footer.php'; ?>
    
</body>
</html>