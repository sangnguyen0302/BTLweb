<?php require_once("inc/head.php"); ?>
    <title>Trang chủ</title>
</head>
<body>
        <?php require_once("inc/nav.php"); ?>
        <!-- Carousel-->
        <div id="thecarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#thecarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#thecarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#thecarousel" data-bs-slide-to="2"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://t.ex-cdn.com/mgn.vn/resize/600x315/files/news/2022/05/19/spy-x-family-anya-minh-chung-cua-cau-con-nha-tong-khong-giong-long-cung-giong-canh-085605.jpg" alt="First slide" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="" alt="Second slide" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="" alt="Third slide" class="d-block w-100">
                </div>
            </div>

            <button type="button" class="carousel-control-prev" data-bs-target="#thecarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button type="button" class="carousel-control-next" data-bs-target="#thecarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
        <?php require_once("inc/footer.php"); ?>
</body>
</html>