<?php 
session_start();
require_once '../views/inc/head.php'; 
require_once '../DB.php';
require_once '../models/categoryModel.php'; 
?>
<title>Chỉnh sửa thông tin sản phẩm</title>
<!--link type="text/css" rel="stylesheet" href= "../../css/admin.css"-->
</head>
<body>
<div class="bg-light my-5 p-3 mx-auto" style="max-width : 500px">
	<h3>Thông tin sản phẩm</h3>
	<form action="../controllers/productMnController.php" method="post">
		<div class="my-3 row ">
			<label for="product-name" class="col-form-label col-4 ">Mã sản phẩm</label>
			<input class="col form-control me-3" type="text" name="id" value="<?php echo $listInfor['id'] ?>" readonly>
		</div>

		<div class="my-3">
			<label for="product-name" class="form-label">Tên sản phẩm</label>
			<input class="form-control" type="text" placeholder="Tên sản phẩm" name="product-name" id="product-name" value="<?php echo $listInfor['name'] ?>">
		</div>

		<div class="row mb-3">
			<label for="" class="form-label">Giá</label>
			<div class="col form-floating">
				<input class="form-control" type="number" placeholder="Giá gốc" name="originalPrice" id="originalPrice" value="<?php echo $listInfor['originalPrice'] ?>">
				<label for="originalPrice" class="ps-4">Giá gốc</label>
			</div>
			<div class="col form-floating">
				<input class="form-control" type="number" placeholder="Giá bán" name="promotionPrice" id="promotionPrice" value="<?php echo $listInfor['promotionPrice'] ?>">
				<label for="promotionPrice" class="ps-4">Giá bán</label>
			</div>
		</div>

		<div class="mb-3">
			<label for="createdDate" class="form-label">Ngày tạo</label>
			<input class="form-control" type="date" name="createdDate" id="createdDate" value="<?php echo $listInfor['createdDate'] ?>">
		</div>

		<?php
			$result = CategoryModel::getAllClient();
			$listCategory = $result->fetch_all(MYSQLI_ASSOC); 
		?>

		<div class="mb-3">
			<label for="" class="form-label">Danh mục</label>
			<div class="form-floating">
			<select class="form-select" name="cateId" id="cateID">
				<?php
                    foreach ($listCategory as $category) { 
						if($category['id'] == $listInfor['cateId']) {
				?>
                      <option value="<?= $category['id'] ?>" selected><?= $category['name'] ?></option>
                  <?php 
				  		} else  {
                  ?>
				  	  <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
				  <?php
						}
					}
				   ?>
			</select>
			<label for="cateID" class="form-label">Danh mục</label>
			</div>
			
		</div>

		<div class="mb-3">
			<label for="qty" class="form-label">Số lượng</label>
			<input class="form-control" type="number" placeholder="Số lượng" name="qty" id="qty" value="<?php echo $listInfor['qty'] ?>">
		</div>

		<div class="mb-3">
			<label for="product-image" class="form-label">Ảnh sản phẩm</label>
  			<input type="file" class="form-control" id="product-image" name="product-image">
		</div>

		<div class="mb-3">
			<label for="des">Mô tả sản phẩm</label>
			<textarea class="form-control" name="des" id="des" placeholder="Mô tả ..."  rows="5"><?php echo $listInfor['des'] ?></textarea>
		</div>
		<div class="text-end">
			<a href="../controllers/managementController.php?action=manageProducts" class="btn btn-secondary">Quay lại</a>
			<button class="btn btn-primary" type="submit" name="edit">Xác nhận</button>
		</div>
	</form>

	</div>

</body>
</html>