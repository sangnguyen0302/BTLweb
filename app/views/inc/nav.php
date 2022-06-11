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
                if (isset($_SESSION['user_id'])) { 
                    
                } else { ?>
                <li class="nav-item">
                  <a class="nav-link" href="regist.php">Đăng ký</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.php">Đăng nhập</a>
                </li>
              <?php  }
              ?>
              <li class="nav-item">
                <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> (<!--?= $total ?-->)</a>
              </li>
          </ul>
        </div>
      </nav>