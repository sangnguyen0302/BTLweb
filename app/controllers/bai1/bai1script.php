
<?php
session_start();
require_once "../../DB.php";
if(isset($_GET['view-db'])){
        $_SESSION['view-db']="view_db active";
        header("Location: ../../views/bai1.php");
        exit();
}
else {
    $_SESSION['view-db']="view_db";
}
if(isset($_GET['add-record'])){
    header("Location: ../../views/bai1.php?add-record=1");
    exit();
}
if(isset($_GET['edit_id'])){
    $id = $_GET['edit_id'];
    header("Location: ../../views/bai1.php?edit-record='$id'");
    exit();
}
if(isset($_GET['delete_id'])){
    $id=$_GET['delete_id'];
    $con = mysqli_connect("localhost","root","","driver_service");
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
        // sửa lại hàm ở đây......///
        $sql = " DELETE FROM account WHERE ID=$id";
        if ($con->query($sql)) {
            echo "New record deletedd successfully";
        }else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
      } 
      header("Location: ../../views/bai1.php");
}
if(isset($_GET['add_confirm']))
{
    $id= $_GET['add-id'];
    $atype= $_GET['add-atype'];
    $un = $_GET['add-uname'];
    $pw = $_GET['add-pass'];
    $ssn = $_GET['add-ssn'];
        if(empty($id)) {
        array_push($errors,  "required"); 
        }
        if (empty($atype)) {
        array_push($errors, "required"); 
        }
        if(empty($un)) {
        array_push($errors, "required"); 
        }
        if(empty($pw)) {
            array_push($errors, "required"); 
        }
        if(empty($ssn)) {
            array_push($errors, "required"); 
        }
        $con = mysqli_connect("localhost","root","","driver_service");
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
        // sửa lại hàm ở đây......///
        $sql = " INSERT INTO ACCOUNT VALUES('$id','$atype','$un','$pw','$ssn')";
        if ($con->query($sql)) {
            echo "New record created successfully";
        }else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
      } 
      header("Location: ../../views/bai1.php");
}
if(isset($_GET['change_confirm']))
{
    $id= $_GET['change-id'];
    $old_id =$_GET['old-id'];
    $atype= $_GET['change-atype'];
    $un = $_GET['change-uname'];
    $pw = $_GET['change-pass'];
    $ssn = $_GET['change-ssn'];
        $con = mysqli_connect("localhost","root","","driver_service");
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
        // sửa lại hàm ở đây......///
        $sql = " UPDATE account SET ID='$id', UserName='$un', ATYPE='$atype', PASS='$pw', SSN='$ssn' WHERE ID=$old_id ";
        if ($con->query($sql)) {
            echo "The record change successfully";
        }else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
      } 
      header("Location: ../../views/bai1.php");
}
?>