<div class="d-flex flex-column p-3 text-white bg-dark" style="width: 220px; position: fixed; height:100%; top:0; left: 0;">
    <!--a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">Quản trị</span>
    </a-->
	<h4>Quản trị</h4>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="../views/management.php?user_id=<?=$_SESSION['admin_id']?>" class="nav-link text-white" aria-current="page">
          <!--svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg-->
          Thông tin tài khoản
        </a>
      </li>
      <li class="nav-item">
        <a href="../controllers/managementController.php?action=manageComments" class="nav-link text-white">
          <!--svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg-->
          Bình luận và đánh giá
        </a>
      </li>
      <li class="nav-item">
        <a href="../controllers/managementController.php?action=manageProducts" class="nav-link text-white">
          <!--svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg-->
          Sản phẩm
        </a>
      </li>
      <li class="nav-item">
        <a href="../controllers/managementController.php?action=manageMembers" class="nav-link text-white">
          <!--svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg-->
          Thành viên
        </a>
      </li>
    </ul>
    <hr>
    <a href="../views/logout.php" class="btn btn-danger">Đăng xuất</a>
  </div>