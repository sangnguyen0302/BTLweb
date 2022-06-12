
<?php
  session_start();
    require_once("../../views/inc/head.php");
?>

<title>Add new record</title>
</head>
<body>
<h2>Add new record</h2>
<form method="get" action="bai1script.php" class="form">
<label for="name">New ID:</label><br>
<input type="text" id="add-id" name="add-id" value=""/><br>
<label for="add-atype">New Atype:</label><br>
<input type="text" id="add-atype" name="add-atype" value=""/><br>
<label for="add-uname">New User name: </label><br>
<input type="text" id="add-uname" name="add-uname" value=""/><br>
<label for="add-pass">New Password:  </label><br>
<input type="password" id="add-pass" name="add-pass" value=""/><br>
<label for="add-ssn">New SSN: </label><br>
<input type="text" id="add-ssn" name="add-ssn" value=""/><br>
<button type="submit" name="add_confirm">ADD</button>
</form>
<br>
<!-- <a href="form.php" class="butonn2">Back</a><br> -->
</body>
</html>