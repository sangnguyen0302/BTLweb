    <?php 
      /*require_once('../models/cartModel.php'); 
      $cart = new CategoryModel();
      $total = $cart->getNumberCart();*/
    ?>
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="home.php">LOGO</a>
          <ul class="navbar-nav">
              <li class="nav-item">
                <a href="#" class="nav-link">Danh mục</a>
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
                    <li><a class="dropdown-item" href="infoUser.php?user_id='<?=$_SESSION['user_id']?>">Thông tin tài khoản</a></li>
                    <li><a class="dropdown-item" href="changepass.php">Đổi mật khẩu</a></li>
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
      </nav>