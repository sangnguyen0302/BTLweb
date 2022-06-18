<?php require_once 'inc/head.php'; ?>
	<title>Nhận xét và đánh giá</title>
</head>
<body>
    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <div class="col-6 bg-light p-3">
                <form action="../controllers/productMnController.php" method="post">
		            
                    <?php $productId=$_GET['productId'];?>
                    <input type="hidden" name="productId" value="<?=$productId?>">

                    <label for="" class="form-label">Đánh giá của bạn</label>
                    <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" checked name="rateValue" id="radio1" value="1">
                                <label class="form-check-label" for="radio1">
                                    <i class="fa-solid fa-star check"></i>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="rateValue" id="radio2" value="2">
                                <label class="form-check-label" for="radio2">
                                    <i class="fa-solid fa-star check"></i>
                                    <i class="fa-solid fa-star check"></i>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="rateValue" id="radio3" value="3">
                                <label class="form-check-label" for="radio3">
                                    <i class="fa-solid fa-star check"></i>
                                    <i class="fa-solid fa-star check"></i>
                                    <i class="fa-solid fa-star check"></i>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="rateValue" id="radio4" value="4">
                                <label class="form-check-label" for="radio4">
                                    <i class="fa-solid fa-star check"></i>
                                    <i class="fa-solid fa-star check"></i>
                                    <i class="fa-solid fa-star check"></i>
                                    <i class="fa-solid fa-star check"></i>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="rateValue" id="radio5" value="5">
                                <label class="form-check-label" for="radio5">
                                    <i class="fa-solid fa-star check"></i>
                                    <i class="fa-solid fa-star check"></i>
                                    <i class="fa-solid fa-star check"></i>
                                    <i class="fa-solid fa-star check"></i>
                                    <i class="fa-solid fa-star check"></i>
                                </label>
                            </div>
                    </div>
                    
		            <div class="my-3 mb-5">
                        <label for="" class="form-label">Bình luận của bạn</label>
      	                <textarea class="form-control" name="user_comment"  rows="7" placeholder="Bình luận" required></textarea>
                    </div>
      	            
                    <div class="row">
                        <div class="col-6 d-flex">
                            <a class="btn btn-secondary btn-lg flex-fill" href="../controllers/orderController.php?action=myOrder">Quay lại</a>
                        </div>
                        <div class="col-6 d-flex">
                            <input class="btn btn-primary btn-lg flex-fill" type="submit" name="Rate" value="Gửi nhận xét">
                        </div>
                    </div>
	            </form>
            </div>
        </div>
    </div>
	
</body>
</html>