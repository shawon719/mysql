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

        //trigger section
        if(isset($_POST["delBtn"])){
            $mid=$_POST["manufact"];
            $db->query("delete from manufacturetabl where id='$mid' ");
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
        <!-- after trigger -->
        <!-- <form action="" method="post">
            Manufacturer:<select name="manufact">
                <?php
                        $manu=$db->query("select * from manufacturetabl");
                        while(list($_mid,$_mname)=$manu->fetch_row()){
                            echo "<option value='$_mid'>$_mname</option>";
                        }
                ?>
            </select><br>
            <button name="delBtn">Delete</button>
        </form> -->

        <?php
            include("trigger.php");
        ?>
    </section>

    <!-- <section>
        <h2>this this view product details table</h2>
        <table border="1">
            <tr>
                <td>Serial</td>
                <td>Product Name</td>
                <td>Price</td>
                <td>Manufacture Name</td>
                <td>Contact</td>
            </tr>
            
           
            <?php
            
                // $product=$db->query("select * from view_products");
                // $count=1;
                // while(list($_id,$_prName,$_price,$_manuName,$_cont)=$product->fetch_row()){
                //     echo "<tr>
                //                 <td>$count</td>
                //                 <td>$_prName</td>
                //                 <td>$_price</td>
                //                 <td>$_manuName</td>
                //                 <td>$_cont</td>
                //     </tr>";
                //     $count++;
                // }
            ?>


        </table>
    </section> -->
    
    <?php
            include("view.php");
    ?>


</body>
</html>