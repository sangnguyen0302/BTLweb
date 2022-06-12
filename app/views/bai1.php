<?php 
session_start();
// unset($_SESSION['view-db']);
require_once("inc/head.php");
require_once("../DB.php");
if(!isset($_SESSION['view-db'])){
        $_SESSION['view-db']="view_db";
}
?>
<title>Bài 1</title>
</head>
<body>
    <form action="../controllers/bai1/bai1script.php" method="get">
        <input type="submit" name="view-db" value="View account table" class="buttonn"/>
    </form>
    <form action="../controllers/bai1/bai1script.php" method="get" >
        <input type="submit" name="add-record" value="Add new record" class="buttonn"/>
    </form>
    <?php
        if(isset($_GET['add-record'])){

            ?>
            <div class="add_new_record">
                <h2>Add new record</h2>
                <form method="get" action="../controllers/bai1/bai1script.php" class="form">
                <label for="name">New ID:</label><br>
                <input type="text" id="add-id" name="add-id" value="" placeholder="Input ID exactly 10 digits"/><br>
                <label for="add-atype">Atype(vị trí):</label><br>
                <input type="text" id="add-atype" name="add-atype" value="" placeholder="Input role"/><br>
                <label for="add-uname">User name: </label><br>
                <input type="text" id="add-uname" name="add-uname" value=""/><br>
                <label for="add-pass">Password:  </label><br>
                <input type="password" id="add-pass" name="add-pass" value=""/><br>
                <label for="add-ssn">SSN: </label><br>
                <input type="text" id="add-ssn" name="add-ssn" value=""/><br>
                <button type="submit" name="add_confirm">ADD</button>
                </form>
                <br>        
            </div>
            <?php
        }
        if(isset($_GET['edit-record'])){
            $id = $_GET['edit-record'];
            $db = new DB();
            $user = $db->getInstance();
            $sql = "SELECT * FROM account WHERE ID=$id";
            $result = mysqli_query($user->con, $sql);
            $value = $result->fetch_assoc(); 
            ?>
            <div class="add_new_record">
                <h2>Edit record </h2>
                <form method="get" action="../controllers/bai1/bai1script.php" class="form">
                New ID:<br>
                <input type="hidden"  name="old-id" value="<?=$id?>" /><br>
                <input type="text"  name="change-id" value="<?=$value['ID']?>" /><br>
                New Atype(vị trí):<br>
                <input type="text"  name="change-atype" value="<?=$value['ATYPE']?>" /><br>
                New User name: <br>
                <input type="text"  name="change-uname" value=""/><br>
                New Password: <br>
                <input type="password"  name="change-pass" value="<?=$value['PASS']?>"/><br>
                New SSN: <br>
                <input type="text"  name="change-ssn" value="<?=$value['SSN']?>"/><br>
                <button type="submit" name="change_confirm">Change</button>
                </form>
                <br>        
            </div>
            <?php
        }
    ?>
    <div class="<?php echo $_SESSION['view-db'];?>">
    <table>
    </td></tr>

    <tr>
        <th>N/O</th>
        <th>ID</th>
        <th>Atype</th>
        <th>User name</th>
        <th>Password</th>
        <th>SSN</th>
        <th>Action</th>
    </tr>
    <?php
        $con = mysqli_connect("localhost","root","","driver_service");
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
        $index =0;
        $sql = "SELECT * FROM ACCOUNT";
        $result = $con->query($sql) ;
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo "<tr><td>"; echo $index; echo "</td><td>" . $row["ID"]. "</td><td>" . $row["ATYPE"] . "</td><td>"
            . $row["UserName"]. "</td>"."<td>" . $row["PASS"]. "</td><td>" . $row["SSN"]. "</td>" ?>
            <td>
                
            <a href="../controllers/bai1/bai1script.php?edit_id=<?= $row["ID"]; ?>" class="buttonn2">Edit</a>
            <a href="../controllers/bai1/bai1script.php?delete_id=<?= $row["ID"]; ?>" class="buttonn2">Delete</a></td></tr>
            
        <?php
            $index+=1;
            }
            
            echo "</table>";
            } else { echo "0 results"; }
            $con->close();
    ?>
    </div>

</body>
</html>