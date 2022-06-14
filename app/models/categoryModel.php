<?php
class CategoryModel
{
    private $product=[];

    public function __construct($Id)
    {
        $db = DB::getInstance();
        $sql = "SELECT * FROM products WHERE id='$Id' AND status=1";
        $result = mysqli_query($db->con, $sql);
        if($result){
            while($row = $result->fetch_assoc()){
                if($row['id']==$Id){
                   $this->product=$row;
                }
            }
        }
    }

    public function storeProduct(){
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'][]=$this->product;
        }else{
            $ids=[];
            foreach($_SESSION['cart'] as $key => $value){
                array_push($ids,$value['id']);
            }
            //Kiểm tra xem sản phẩm này có trong giỏ hàng chưa
            if(!in_array($this->product['id'],$ids)){ 
                $_SESSION['cart'][]=$this->product;
            }
        }
        /*highlight_string("<?php". var_export($_SESSION['cart'], true).";?>");*/
    }

    public function removeItem(){
        if(isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $key => $value){
                if($value['id']==$this->product['id']){
                    unset($_SESSION['cart'][$key]);
                }
            }    
        }
    }

    public function updateQuantity($quant){
        foreach($_SESSION['cart'] as $key => $value){
            if($value['id']==$this->product['id']){
                $_SESSION['cart'][$key]['status']= $quant;
            }
        }    
        
    }

    public static function getNumberCart()
    {
        return count($_SESSION['cart']);
    }

    public static function getTotalPrice(){
        $sum = 0;
        foreach($_SESSION['cart'] as $value){
            $sub_sum = $value['originalPrice']*$value['status'];
            $sum+=$sub_sum;
        }
        return $sum;
    }
    public static function clearCart()
    {
        unset($_SESSION['cart']);
    }
    // public static function getInstance()
    // {
    //     if (!self::$instance) {
    //         self::$instance = new CategoryModel();
    //     }

    //     return self::$instance;
    // }

    // public function getAllClient()
    // {
    //     $db = DB::getInstance();
    //     $sql = "SELECT * FROM Categories WHERE status=1";
    //     $result = mysqli_query($db->con, $sql);
    //     return $result;
    // }

    // public function getById($Id)
    // {
    //     $db = DB::getInstance();
    //     $sql = "SELECT * FROM Categories WHERE Id='$Id' AND status=1";
    //     $result = mysqli_query($db->con, $sql);
    //     return $result;
    // }
}