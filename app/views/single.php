
<?php
    //session_start();
    require_once '../DB.php';
    require_once 'inc/head.php';
    $db = new DB();
    $user = $db->getInstance();
    $id = $productId;
    $sql = "SELECT * FROM products WHERE id='$id'";
    $result=mysqli_query($user->con, $sql);
    $value=$result->fetch_assoc();
?>
<title><?= $value['name'] ?></title>
<script src="../../javascript/pmbtnp.js"></script>
<link type="text/css" rel="stylesheet" href= "../../css/single.css">
</head>
<body>
    <?php 
        require_once 'inc/nav.php';
        $db = new DB();
        $user = $db->getInstance();
        $id = $productId;
        $sql = "SELECT * FROM products WHERE id='$id'";
        $result=mysqli_query($user->con, $sql);
        $value=$result->fetch_assoc();
    ?>
    
    <main class="my-5">
        <div class="container mx-auto">

            <div class="row bg-white product-info mb-5">
                <div class="col-lg-6 border border-start-0 border-top-0 border-bottom-0 py-3 h-100">
                <img src="../../image/<?=$value['image']?>" alt="" width=100% height="100%">
                </div>

                <div class="col-lg-6 py-3 h-100">

                    <div class="product-header my-3">
                        <h3>Tên sản phẩm: <?php echo $value['name']?></h3>
                        <h4>Số lượng còn lại: <?php echo $value['qty']?></h4>   
                    </div>

                    <div class="product-body">
                        <div class="product-price bg-light py-2 px-3">
                            <span class="h2 text-danger"><?php echo number_format($value['originalPrice'])?> VNĐ</span>
                        </div>
                        <form>
                        <div class="add-to-cart py-5">
                            <div class="qty-modify">
                                <p>Số lượng</p>
                               
                                <div class="input-group qty-button-group">
                                <span class="input-group-btn">
                               
                                <button name="quantity-update" class="btn btn-number btn-outline-light border border-1 text-dark" data-type="minus" data-field="a">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                                </span>
                        
                                <input type="text" name="quantity" id="a" class="form-control input-number" value="1" min="1" max="5">

                                <span class="input-group-btn">
                                <button name="quantity-update" class="btn btn-number btn-outline-light border border-1 text-dark" data-type="plus" data-field="a">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                                
                                </span>
                                </div>
                                
                                <!--input type="hidden" name="product-id" value=""/-->
                            </div>

                            <div class="add-to-cart-btn my-5">
                                    <?php 
                                        if(!isset($_SESSION['user_id'])){
                                            $url= "../controllers/script.php?single-store-product-id=".$value['id'];
                                        }else{
                                            $url = "../controllers/script.php?single-store-product-id-user=".$value['id'];
                                        }
                                    ?>
                                    <a class="btn btn-outline-dark" href="<?=$url?>">Thêm vào giỏ hàng</a>
                            </div>
                            
                        </div>
                        </form>
                    </div>
            
                </div>

            </div>

            <div class="product-description bg-white row mb-5 p-3">
                <h4>Mô tả sản phẩm</h4>
                <div>
                    <?php 
                        echo $value['des'];
                    ?>
                </div>
            </div>

            <div class="product-rate-comment bg-white row p-3">

                <div class="print-rate">
                    <!-- Print average rate number -->
                    <h4>Đã đánh giá</h4>
                    <?php
                        echo $averRate;    

                    ?>

                </div>

                <div class="print-comments">
                    <!-- Print comments -->
                    <?php
                        $checkExistComment=0;  
                        foreach ($productRow as $key => $value) {
                            if(!empty($value['comment'] && $value['productId']==$productId)){
                                $checkExistComment=1;
                    ?>

                                <h4><?php echo $value['fullName'] ?></h4>
                                <p><?php echo $value['comment'] ?></p>
                                <br>
                    <?php        
                                }
                        }
                        if($checkExistComment==0){
                        
                    ?>

                            <p>Chưa có bình luận</p>
                    <?php
                        }
                    ?>

                </div>

                <?php  
                    if($checkOrdered ){
                ?>
                
                    <!--
                    Five <a> tag below are allow user to rate thier ordered product
                    They will sent a request to productMnController.php 
                     -->
                    <!-- <p>Đánh giá</p>
                    <a href="../controllers/productMnController.php?action=rate&value=1&productId=<?php //echo $productId?>">1 sao</a>
                    <a href="../controllers/productMnController.php?action=rate&value=2&productId=<?php //echo $productId?>">2 sao</a>
                    <a href="../controllers/productMnController.php?action=rate&value=3&productId=<?php //echo $productId?>">3 sao</a>
                    <a href="../controllers/productMnController.php?action=rate&value=4&productId=<?php //echo $productId?>">4 sao</a>
                    <a href="../controllers/productMnController.php?action=rate&value=5&productId=<?php //echo $productId?>">5 sao</a> -->


                    <!-- 
                        This <form> tag below is allows user to comment into thier ordered product
                        It will sent a request to productMnController.php with post method
                    -->
                    <?php  
                        if($checkComment ){
                    ?>

                            <!-- <form action="../controllers/productMnController.php" method= "post">
                                <p>Bình luận</p>
                                <textarea name="user_comment" cols="100" rows="5">Bình luận...</textarea>
                                <input type="submit" name="comment" value="<?php echo $productId?>">
                            </form> -->
                    <?php
                        }
                    ?>
                    


                <?php       
                    }

                ?>
                


            </div>
        </div>
    </main>
        <?php require_once 'inc/footer.php'; ?>
</body>
</html>