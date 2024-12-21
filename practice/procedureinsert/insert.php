<?php
        include("dbcon.php");

        //this code is for binding with the manufacture table properties;
        if(isset($_POST["addManu"])){
            $manufactureName=$_POST["ma"];
            $contact=$_POST["co"];
            $db->query("call manu('$manufactureName','$contact')");
        }

        //this code is for binding with the product table properties;
        if(isset($_POST["addPro"])){
            $productName=$_POST["pro"];
            $price=$_POST["pric"];
            $manuName=$_POST["manufact"];
            $db->query("call add_prod('$productName','$price','$manuName')");
            
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
    <section>
        <form action="" method="post">
            <h2>this manufacture table</h2>
            Manufacture Name:<input type="text" name="ma"><br><br>
            Contact: <input type="text" name="co"><br><br>
            <button name="addManu">Submit</button>
        </form>
    </section>
    <section>
        <form action="" method="post">
            <h2>this is add product table</h2>
            Product Name: <input type="text" name="pro"><br><br>
            Price:<input type="text" name="pric"><br><br>
            Manufacture Name: <select name="manufact" id="">
                <?php
                        $manu=$db->query("select * from manufacturetabl");
                        while(list($_mid,$_mname)=$manu->fetch_row()){
                            echo "<option value='$_mid'>$_mname</option>";
                        }
                ?>
            </select><br><br>
            <button name="addPro">Add product</button>
        </form>
    </section>
    


</body>
</html>