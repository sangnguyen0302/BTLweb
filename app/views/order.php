<?php
    require_once '../views/inc/head.php';
    require_once '../DB.php';
    $db=new DB();
    $user= $db->getInstance();
?>
<title>Đơn hàng của tôi</title>
</head>
<body>
    <?php require_once '../views/inc/nav.php' ?>
    <div class="container-fluid mb-5 py-5">
    <div class="container mb-5 p-3 bg-light">
        <h4>Đơn hàng của tôi</h4>
            <?php
                if(count($list)>0){  
                    $total=0;
            ?>
            
                <?php foreach ($list as $key => $value) {
                    $count=0;
                    ?>
                    <div class="table-responsive-xxl">
                    <table id = "order_table" class="table table-hover">
                        <thead class="text-center align-middle">
                        <tr>
                            <th>STT</th>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tạm tính</th>                   
                        </tr>
                        </thead>
                <?php
                    $total = $value['totalPrice'];
                    $orderId=$value['id'];
                    $sql = "SELECT * FROM order_details WHERE orderId='$orderId'";
                    $result=mysqli_query($user->con,$sql);
                    while($value2=$result->fetch_assoc()){

                ?>      
                    
                        <?php
                                $productId=$value2['productId'];
                                $sql="SELECT * FROM products WHERE id='$productId'";
                                $result2 = mysqli_query($user->con, $sql);
                                $prod = $result2->fetch_assoc(); 
                        ?>
                        <tbody class="text-center align-middle">
                        <tr>
                        <td><?php echo ++$count; ?></td>
                        <td>
                            <div>
                                <?php
                                    echo $prod['image'];
                                    echo $prod['name'];
                                    echo $prod['id'];
                                ?>
                                <!-- <form>
                                    <input type="submit" name="write-cmt" value="Viết nhận xét">
                                </form>
                                <form>
                                    <input type="text" name="rate" value="">
                                    <input type="submit" name="write-cmt" value="Đánh giá">
                                </form> -->
                                <a href="../controllers/orderController.php?action=viewDetail&id=<?php echo $productId ?>">Chi tiết sản phẩm</a>

                            </div>
                        </td>
                        <td><?php echo $prod['originalPrice']; ?></td>
                        <td><?php echo $value2['productQty']; ?></td>
                        <td><?php echo $prod['originalPrice']*$value2['productQty']; ?></td>              
                        </tr>
                <?php
                    }
                    ?>
                    <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Tổng tiền</td>
                    <td><?= number_format($value['totalPrice'], 0, '', ',') ?>VND</td>
                </tr>
                <?php
                 }
                ?>

                
            </tbody>
    </table>


    <a href="../controllers/loginController.php?action=return">Tiếp tục mua hàng</a>
    
    <?php  
        }else{
        ?> 
                <div class="text-center">
                    <img src="../../image/mascot2x.png" alt="..">
                    <h6>Bạn không có đơn hàng nào</h6>
                    <a class="btn btn-warning"href="../views/home.php">Đi mua sắm</a>
                </div>
    <?php
        }
    ?>
        
    </div>
    </div>

    </div>
    <?php require_once '../views/inc/footer.php' ?>
</body>
</html>