<?php
    session_start();

?>


<?php 
require  '../views/inc/head.php';
require '../models/ProductModel.php';
require '../DB.php';
 ?>

<div class="products">
		<?php 
			// Fetching the products from the JSON file 
            $prod = new ProductModel();
            $result = $prod->getInstance();
            if($result){
               while($data=$result->fetch_assoc()) 
			 {
				?>
					<!-- The product element -->
					<div class="product">
					<!-- The products image -->
						<img src="<?php echo "../../image/".$data['image'] ?>" alt="">
					<!-- The products name -->
						<p class="name"><?php echo $data['name'] ?></p>
					<!-- The products price formatted with two decimals  -->
						<p class="price">$<?php echo number_format($data['originalPrice'], 2) ?></p>
					<!-- The add cart button -->
						<a href="../controllers/script.php?store-product-id=<?php echo $data['id'];?>">Add to cart</a> 
					</div> <!-- End of product element -->
				<?php				
			}
            }     
		 ?>
</div> <!-- End of products -->