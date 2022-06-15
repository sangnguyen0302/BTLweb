    <?php 
      require_once '../models/categoryModel.php';
      $result = CategoryModel::getAllClient();
      $listCategory = $result->fetch_all(MYSQLI_ASSOC);
    ?>
      <nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="home.php">LOGO</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
          <form class="d-flex me-auto">
            <input class="form-control me-2" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
            <button class="btn btn-outline-light" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </form>
          <ul class="navbar-nav my-2 my-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown">
                  Danh mục
                </a>
                  <ul class="dropdown-menu dropdown-menu-dark">
                  <?php
      
                    foreach ($listCategory as $category) { 
                      $id=$category['id']
                      ?>
                      <li><a class="dropdown-item" href='home.php?cateid=<?=$id?>'><?= $category['name'] ?></a></li>
                  <?php }
                  ?>
                  </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">Giới thiệu</a>
              </li>
              <?php
                if (isset($_SESSION['user_id'])) { ?>
                  <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown">
                    <?=$_SESSION['user_name'] ?>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="../controllers/orderController.php?action=myOrder">Đơn hàng của tôi</a></li>
                    <li><a class="dropdown-item" href="infoUser.php?user_id=<?=$_SESSION['user_id']?>">Thông tin tài khoản</a></li>
                    <li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>
                  </ul>
                </li>
                <?php } else { ?>
                <li class="nav-item">
                  <a class="nav-link" href="regist.php">Đăng ký</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.php">Đăng nhập</a>
                </li>
              <?php  }
              ?>
              <li class="nav-item">
                <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> 
                <?php if(isset($_SESSION['cart'])){
                  echo "(";
                  echo count($_SESSION['cart']);
                  echo ")";
                }else{echo"(0)";}?></a>
              </li>
          </ul>
          
          </div>
        </div>
      </nav>