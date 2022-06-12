
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
        $sql = " INSERT INTO ACCOUNT VALUES('$id','$atype','$un','$pw','$ssn')";
        if ($con->query($sql)) {
            echo "New record created successfully";
        }else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
      } 
      header("Location: addrecord.php");
}
?>