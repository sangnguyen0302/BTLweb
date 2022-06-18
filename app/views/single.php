
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

            
            <div class="row mb-5 product-info">
                <div class="col-6 border border-start-0 border-top-0 border-bottom-0 py-3 h-100 bg-white">
                <img src="../../image/<?=$value['image']?>" alt="" width=100% height="100%">
                </div>

                <div class="col-6 py-3 h-100 bg-white">

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
                <h4>Đánh giá và bình luận</h4>
                <div class="print-rate">       
                    <h5>Đánh giá trung bình</h5>
                    <div>
                    <span style="font-size:3em" class="me-3">
                        <?php
                        echo $averRate;    
                        ?>
                    </span>
                    <span class="fs-5">
                        <?php
                            $averRate = round($averRate);
                            for($i=1 ; $i <= $averRate ; $i++)
                            {
                        ?>
                            <i class="fa-solid fa-star check"></i>
                        <?php }

                            for($i=$averRate + 1; $i <= 5; $i++)
                            {
                        ?>
                            <i class="fa-solid fa-star"></i>
                        <?php } ?>
                    </span>
                    </div>
                </div>
                <hr style="border:3px solid #f1f1f1">
                

                <div class="print-comments">
                    <!-- Print comments -->
                    <?php
                        $checkExistComment=0;  
                        foreach ($productRow as $key => $value) {
                            if(!empty($value['comment']) && $value['productId']==$productId ){
                                
                                $checkExistComment=1;
                    ?>      
                                <hr style="border:3px solid #f1f1f1">
                                <div class="each-comment my-5">
                                    <div class="user_face row">
                                        <div class="avatar col-auto pe-0">
                                            <img src="../../image/<?=$value['image']?>" alt="avatar" class="rounded-circle" width="45px" height="45px">
                                        </div>
                                        <div class="col">
                                            <span class="h6 fw-bold">
                                                <?php echo $value['fullName']; ?> <br>
                                            </span> 
                                            <span>
                                            <?php
                                                for($i=1 ; $i <= $value['rate'] ; $i++)
                                                    {
                                            ?>
                                                        <i class="fa-solid fa-star check"></i>
                                            <?php }

                                                for($i=$value['rate'] + 1; $i <= 5; $i++)
                                                    {
                                            ?>
                                                        <i class="fa-solid fa-star"></i>
                                            <?php } ?>
                                            </span>
                                        </div>
                                        
                                    </div>
                                
                                    <div class="comment mt-2 ps-3" style="margin-left: 45px">
                                        <p>
                                            <?= $value['comment']?>
                                        </p>
                                    </div>
                                
                                </div>
                                
                    <?php        
                                }
                        }
                        if($checkExistComment==0){
                        
                    ?>

                            <div class="text-center">
                                <div class="mb-2">
                                <img src="../../image/grey_star.png" alt="Grey star">
                                </div>
                                
                                <span class="fs-5">Chưa có bình luận nào</span>
                            </div>
                            
                    <?php
                        }
                    ?>

                </div>



            </div>
        </div>
    </main>
        <?php require_once 'inc/footer.php'; ?>
</body>
</html>