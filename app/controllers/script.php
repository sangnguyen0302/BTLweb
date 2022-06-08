<?php
    session_start();

    require("../models/cartModel.php");
    require("../models/ProductModel.php");
    require("../DB.php");
    if(isset($_GET['store-product-id'])){
        $product_id = $_GET['store-product-id'];
        $cart = new CategoryModel($product_id);
        $cart->storeProduct();
        header("Location: ../views/catetory.php");
        exit();
    }
    if(isset($_GET['remove-product-id'])){
        $product_id = $_GET['remove-product-id'];
        echo $product_id;
        $cart = new CategoryModel($product_id);
        $cart->removeItem();
        header("Location: ../views/catetory.php");
        exit();
    }
    if(isset($_GET['quantity-update'])){
        $product_id = $_GET['product-id'];
        $quant = $_GET['quantity'];
        if(is_numeric($quant) && $quant>0){
            $cart = new CategoryModel($product_id);
            $cart->updateQuantity($quant);
        }
        header("Location: ../views/catetory.php");
        exit();
    }
    if(isset($_GET['clear-cart'])){
        CategoryModel::clearCart();
        header("Location: ../views/catetory.php");
        exit();
    }
?>