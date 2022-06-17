<?php
class ProductModel
{
    public function __construct()
    {
    }

    public function getAll()
    {
        $db = DB::getInstance();
        $sql = "SELECT * FROM Products WHERE qty>0";
        $result = mysqli_query($db->con, $sql);
        return $result;
    }

    public function getPage($page)
    {
        $db = DB::getInstance();
        $per_page_record = 6;  // Number of entries to show in a page.   
        $start_from = ($page-1) * $per_page_record;

        $sql = "SELECT * FROM Products  WHERE qty>0 LIMIT $start_from, $per_page_record";
        $result = mysqli_query($db->con, $sql);
        return $result;
    }
    public function getPageandCateid($page, $cateid)
    {
        $db = DB::getInstance();
        $per_page_record = 6;  // Number of entries to show in a page.   
        $start_from = ($page-1) * $per_page_record;
        $sql = "SELECT * FROM Products  WHERE cateId='$cateid' AND qty>0 LIMIT $start_from, $per_page_record";
        $result = mysqli_query($db->con, $sql);
        return $result;
    }
    public function getPageandSearch($page, $searchkey)
    {
        $db = DB::getInstance();
        $per_page_record = 6;  // Number of entries to show in a page.   
        $start_from = ($page-1) * $per_page_record;
        $tmp = '%'.$searchkey.'%';
        $sql = "SELECT * FROM Products  WHERE name LIKE '$tmp' AND qty>0 LIMIT $start_from, $per_page_record";
        $result = mysqli_query($db->con, $sql);
        return $result;
    }

    public function search($keyword)
    {
        $db = DB::getInstance();
        $sql = "SELECT * FROM Products WHERE MATCH(name,des) AGAINST ('$keyword') AND status=1";
        $result = mysqli_query($db->con, $sql);
        return $result;
    }

    public function getById($Id)
    {
        $db = DB::getInstance();
        $sql = "SELECT * FROM Products WHERE Id='$Id' AND status=1";
        $result = mysqli_query($db->con, $sql);
        return $result;
    }

    public function getByCateId($CateId)
    {
        $db = DB::getInstance();
        $sql = "SELECT * FROM Products WHERE cateId='$CateId' AND qty>0";
        $result = mysqli_query($db->con, $sql);
        return $result;
    }

    public function getFeaturedProducts()
    {
        $db = DB::getInstance();
        $sql = "SELECT * FROM Products WHERE status=1 ORDER BY soldCount DESC";
        $result = mysqli_query($db->con, $sql);
        return $result;
    }

    public function checkQuantity($Id, $qty)
    {
        $db = DB::getInstance();
        $sql = "SELECT qty FROM Products WHERE status=1 AND Id='$Id'";
        $result = mysqli_query($db->con, $sql);
        $product = $result->fetch_assoc();
        if (intval($qty) > intval($product['qty'])) {
            return false;
        }
        return true;
    }

    public function updateQuantity($Id, $qty)
    {
        $db = DB::getInstance();
        $sql = "UPDATE products SET qty = qty - $qty WHERE id = $Id";
        $result = mysqli_query($db->con, $sql);
        return $result;
    }
    public function searchKey($key){
        $db = DB::getInstance();
        $tmp= '%'.$key.'%';
        $sql = "SELECT * FROM products WHERE name LIKE '$tmp'";
        $result = mysqli_query($db->con, $sql);
        return $result;
    }
}