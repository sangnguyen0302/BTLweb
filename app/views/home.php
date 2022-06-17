<?php 
    session_start();
    require_once("inc/head.php");
    require_once("../DB.php");
    require_once '../models/ProductModel.php';
 ?>

<title>Trang chủ</title>
</head>

<body>
        <?php require_once("inc/nav.php"); ?>
        <!-- Carousel-->
        <div id="thecarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#thecarousel" data-bs-slide-to="0" class="active"></button>
                <!--button type="button" data-bs-target="#thecarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#thecarousel" data-bs-slide-to="2"></button-->
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://t.ex-cdn.com/mgn.vn/resize/600x315/files/news/2022/05/19/spy-x-family-anya-minh-chung-cua-cau-con-nha-tong-khong-giong-long-cung-giong-canh-085605.jpg" alt="First slide" class="d-block w-100">
                </div>
                <!--div class="carousel-item">
                    <img src="" alt="Second slide" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="" alt="Third slide" class="d-block w-100">
                </div-->
            </div>

            <button type="button" class="carousel-control-prev" data-bs-target="#thecarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button type="button" class="carousel-control-next" data-bs-target="#thecarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>


        
    <!-- product card grid-->
    <div class="container my-5">
    <div class="row row-cols-2 row-cols-md-3 g-4">
            <?php 
			    // Fetching the products from the JSON file 
                $prod = new ProductModel();

                // Look for a GET variable page if not found default is 1.        
                if (isset($_GET["page"])) {    
                    $page  = $_GET["page"];    
                }    
                else {    
                    $page=1;    
                }
                if(isset($_GET['search-submit'])){
                    $key = $_GET['search-key'];
                    $result=$prod->getPageandSearch($page,$key);
                    if($result&&mysqli_num_rows($result)>0){
                        
                    }else{
                        echo "<div class='message'>Không tồn tại sản phẩm tìm kiếm</div>";
                    }
                } else{
                    if(isset($_GET['cateid'])){
                        $result=$prod->getPageandCateid($page,$_GET['cateid']);
                    }
                    else{
                        $result = $prod->getPage($page);
                    }
                }
                if($result){
                    while($data=$result->fetch_assoc()) 
			    {
				?>
					<!-- The product element -->
					<div class="col">
                        <div class="card h-100 text-center">
					<!-- The products image -->
                        <a href="single.php?prod_id=<?=$data['id']?>">
                        <div class="zoom">
                            <img src="<?php echo "../../image/".$data['image'] ?>" class="card-img-top" alt="...">
                        </div>
                        </a>
					<!-- The products name -->
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $data['name'] ?></h5>
						<!--p class="name"><,?php echo $data['name'] ?></p-->
					<!-- The products price formatted with two decimals  -->
                            <p class="card-text">$<?php echo number_format($data['originalPrice'], 2) ?></p>
						    <!--p class="price">$<,?php echo number_format($data['originalPrice'], 2) ?></p-->
					<!-- The add cart button -->
                            <?php 
                                if(!isset($_SESSION['user_id'])){
                                    $url = "../controllers/script.php?store-product-id=".$data['id'];
                                }else{
                                    $url = "../controllers/script.php?store-product-id-user=".$data['id'];
                                }
                                
                            ?>
						    <a class="btn btn-dark" href="<?=$url?>">Thêm vào giỏ hàng</a> 
                        </div>
                        </div>
					</div> <!-- End of product element -->
				<?php				
			}
            }     
		 ?>
        </div> <!-- End of products -->

        <nav aria-label="Page navigation" class="my-3 text-dark">
            <ul class="pagination justify-content-center">
            <?php  
                if(isset($_GET['cateid'])){
                    $result=$prod->getByCateid($_GET['cateid']);
                }
                else if(isset($_GET['search-submit'])){
                    $key=$_GET['search-key'];
                    $result=$prod->searchKey($key);
                }
                else{
                    $result = $prod->getAll();
                }
                $total_records = mysqli_num_rows($result);    
          
                $per_page_record = 6;
                $total_pages = ceil($total_records / $per_page_record);    
                $pagLink = "";
                if($page >= 2) {      
            ?>
                <li class="page-item">
                <a class="page-link" href="home.php?page=<?=($page-1) ?>"><i class="fa-solid fa-chevron-left"></i></a>
                </li> 
            
            <?php 
                }
                for ($i=1; $i<=$total_pages; $i++) {   
                    if ($i == $page) {   
                    $pagLink .= "<li class='page-item active'><a class = 'page-link' href='home.php?page="  
                                                .$i."'>".$i." </a></li>";   
                }               
                else  {   
                    $pagLink .= "<li class='page-item'><a class = 'page-link' href='home.php?page="  
                                                .$i."'>".$i." </a></li>";     
                }   
                };     
                echo $pagLink;   
  
                if($page<$total_pages) {
                ?>
                <li class="page-item">
                <a class="page-link" href='home.php?page=<?=($page+1) ?>'><i class="fa-solid fa-chevron-right"></i></a>
                </li>
                <?php } ?>
            </ul>
        </nav>    
    </div>
             
        <?php require_once("inc/footer.php"); ?>
</body>
</html>