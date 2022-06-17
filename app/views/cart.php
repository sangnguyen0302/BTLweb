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
<div class="pb-5">


<div class="container my-5">
<h4>GIỎ HÀNG</h4>
<?php
    if(!isset($_SESSION['user_id'])&&isset($_SESSION['cart'])&&count($_SESSION['cart'])!=0) { ?>
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
            <tbody class="table-light text-center align-middle">
      
                <?php
                    //print_r($_SESSION['cart']);
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
				    <td><?php echo number_format($value['originalPrice'])."VND"?></td>
				    <td><?php echo number_format($value['originalPrice']*$value['status'])?></td>
				    <td><a class="text-danger" href="../controllers/script.php?remove-product-id=<?php echo $value['id'];?>"><i class="fa-solid fa-trash-can"></i></a></td>
                </tr>
                <?php
                }
                ?>

            <tr>
			    <td class="cart-items" colspan="6">
                    Cart Items <span> <?php echo CartModel::getNumberCart()?></span>
                </td>
	        </tr>

            <tr> <!-- The total sum -->
				<td class="total-price" colspan="6">Total Price
                    <span>
                        <?php echo number_format(CartModel::getTotalPrice())?>
                    </span>
                </td>
			</tr>

			<tr> <!-- The clear cart button -->
				<td colspan="6"> <a href="../controllers/script.php?clear-cart" class="btn btn-danger">Dọn dẹp giỏ hàng</a> </td>
			</tr>
            </tbody>
        </table>
</div>

    <?php } else if(!isset($_SESSION['user_id'])) { ?>
         <div class="container-fluid text-center">
            <img src="https://www.english-learning.net/wp-content/uploads/2019/04/sorry-min.png" alt="Sorry" width="300px" heigt="300px" class="m-3">
            <h5>Giỏ hàng đang trống</h5>
            <a href="home.php" class="btn btn-dark">Quay lại</a>
         </div>
    <?php } ?>
    <?php
    if(isset($_SESSION['user_id'])) { 
        $id = $_SESSION['user_id'];
        $result = CartModel::getCartFromId($id);
        if($result&&mysqli_num_rows($result)>0){
        ?>
        
        <div class="row">
            <div class="col-xl-9">
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

                    <tbody class="table-light text-center align-middle">
      
                        <?php
                            while($value = $result->fetch_assoc()){
                        ?>
                    <tr> <!-- The product html template -->
				        <td><img src="<?php echo "../../image/".$value['image']?>" width="100px" height="100px"></td>
				        <td><?php echo $value['name']?></td>
				        <td>
                        <form action="../controllers/script.php" method="get">
                            <div class="input-group">
                                <span class="input-group-btn">
                                <button type="submit" name="quantity-update-user" class="btn btn-number" data-type="minus" data-field="<?= $value['id']?>">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                                </span>
                        
                                <input type="text" name="quantity-user" id="<?= $value['id']?>" class="form-control input-number" value="<?=$value['quanty']?>" min="1" max="5" style="width:5px">

                                <span class="input-group-btn">
                                <button type="submit" name="quantity-update-user" class="btn btn-number" data-type="plus" data-field="<?= $value['id']?>">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                                </span>
                            </div>
                            <input type="hidden" name="product-id-user" value="<?php echo $value['id']?>"/>
                        </form>
                    
                        </td>
				        <td><?php echo number_format($value['originalPrice'])."VND"?></td>
				        <td><?php echo number_format($value['originalPrice']*$value['quanty'])."VND"?></td>
                        <td><a class="text-danger" href="../controllers/script.php?remove-product-id-user=<?php echo $value['id'];?>"><i class="fa-solid fa-trash-can"></i></a></td>
                    </tr>

                        <?php
                            }
                        ?>

                    <tr>
			            <td class="cart-items" colspan="6">
                            Cart Items <span> <?php echo CartModel::getNumberCartUser()?></span>
                        </td>
	                </tr>

                    <tr> <!-- The total sum -->
				        
			        </tr>

			        <tr> <!-- The clear cart button -->
				        <td colspan="6"> <a href="../controllers/script.php?clear-cart-user" class="btn btn-danger">Dọn dẹp giỏ hàng</a> </td>
			        </tr>
                    </tbody>
                </table>
            </div>
            </div>

            <div class="col-xl-3">
                <div class="bg-light p-3">
                    <div class="row border border-2 border-start-0 border-end-0 border-top-0 mb-3">
                        <div class="col">
                            <span class="fw-bold">Tổng tiền</span>
                        </div>
                        <div class="col text-end text-danger">
                        <span>
                            <?php echo number_format(CartModel::getTotalPriceUser())."VND"?>
                        </span>
                        </div>
                    </div>

                    <div class="row">
                        <span class="d-block pb-2 fs-5">Chọn hình thức thanh toán: </span> 
                        <form action = "../controllers/paymentController.php" method="post">
                            <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="radio1" value="Payment_on_deliver">
                                <label class="form-check-label" for="radio1">Thanh toán khi nhận hàng</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="radio2" value="digital_wallet">
                                <label class="form-check-label" for="radio2">Thanh toán bằng ví điện tử</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="radio3" value="banking">
                                <label class="form-check-label" for="radio3">Chuyển khoản ngân hàng</label>
                            </div>
                            </div>

                            <div class="d-flex flex-column">
                                <input class="btn btn-warning" type="submit" name="paymentAction" value="Payment">
                            </div>
                        </form>
                    </div>
                </div>
            
            </div>
        </div>
        
        
        

        


    <?php } else { ?>
         <div class="container-fluid text-center">
            <img src="https://www.english-learning.net/wp-content/uploads/2019/04/sorry-min.png" alt="Sorry" width="300px" heigt="300px" class="m-3">
            <h5>Giỏ hàng đang trống</h5>
            <a href="home.php" class="btn btn-dark">Quay lại</a>
         </div>
    <?php } 
    }
    ?>

</div>

<!--
    This is payment form. It's will send a request to paymentController with value Payment. 
    You can place it in another location that is reasonable.
-->
    

</div>
    <?php require_once 'inc/footer.php'; ?>
    
</body>
</html>