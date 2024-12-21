<?php
        include("dbcon.php");

        //this code is for binding with the manufacture table properties;
        if(isset($_POST["addManu"])){
            $manufactureName=$_POST["ma"];
            $contact=$_POST["co"];
            $db->query("call manu('$manufactureName','$contact')");
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert,add view,trigger</title>
</head>
<body>
    <form action="" method="post">
        <h2>this manufacture table</h2>
        Manufacture Name:<input type="text" name="ma"><br><br>
        Contact: <input type="text" name="co"><br><br>
        <button name="addManu">Submit</button>
    </form>
</body>
</html>