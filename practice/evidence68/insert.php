<?php
         $db=mysqli_connect("localhost","root","","com");

        if(isset($_POST["maSub"])){
            $mname=$_POST["maName"];
            $add=$_POST["adName"];
            $con=$_POST["coName"];
            $db->query("call man('$mname','$add','$con')");
        }

        if(isset($_POST["addPro"])){
            $pname=$_POST["ame"];
            $price=$_POST["pp"];
            $mid=$_POST["manufact"];
            $db->query("call pro('$pname','$price','$mid')");
        }

        if(isset($_POST["del"])){
            $dlt=$_POST["manufact"];
            $db->query("delete from manufacturer where id='$dlt' ");
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert</title>
</head>
<body>
        <section>
            <h1>manufacture</h1>
            <form action="" method="post">
                manufacture Name:<input type="text" name="maName"><br><br>
                Address:
                <input type="text" name="adName"><br><br>
                Contact:
                <input type="text" name="coName"><br><br>
                <button name="maSub">Submit</button>
            </form>
        </section>
        <section>
            <h1>product</h1>
            <form action="" method="post">
                Product Name:
                <input type="text" name="ame"><br><br>
                Price:
                <input type="text" name="pp" id=""><br><br>
                Manufacture:
                <select name="manufact" id="">
                    <?php
                            $manu=$db->query("select * from manufacturer");
                            while(list($_mid,$_mname)=$manu->fetch_row()){
                                echo "<option value='$_mid'>$_mname</option>";
                            }
                    ?>
                </select>
                <button name="addPro">Add product</button>
            </form>
            <form action="" method="post">
                manufacture:
                <select name="manufact" id="">
                    <?php
                            $manu=$db->query("select * from manufacturer");
                            while(list($_mid,$_mname)=$manu->fetch_row()){
                                echo "<option value='$_mid'>$_mname</option>";
                            }
                    ?>
                </select>
                
                <button name="del">Delete</button>
            </form>
        </section>

        <section>
            <h1>product view</h1>
            <table border="1">
                <tr>
                    <td>Serial</td>
                    <td>Product Name</td>
                    <td>Price</td>
                    <td>Address</td>
                    <td>Contact</td>
                </tr>
                <?php
                        $product=$db->query("select * from display_product");
                        while(list($_id,$_pname,$_pprice,$_address,$_contact)=$product->fetch_row()){
                            echo "<tr>
                                        <td>$_id</td>
                                        <td>$_pname</td>
                                        <td>$_pprice</td>
                                        <td>$_address</td>
                                        <td>$_contact</td>
                            </tr>";
                        }
                ?>
            </table>
        </section>
        <section>
            <table border="1">
                <h1>this new display table</h1>
                <tr>
                    <td>Serial</td>
                    <td>product name</td>
                    <td>price</td>
                    <td>address</td>
                    <td>contact</td>
                </tr>
                <?php
                     $product=$db->query("select * from new_display");
                        while(list($_id,$_pname,$_pprice,$_address,$_contact)=$product->fetch_row()){
                            echo "<tr>
                                        <td>$_id</td>
                                        <td>$_pname</td>
                                        <td>$_pprice</td>
                                        <td>$_address</td>
                                        <td>$_contact</td>
                            </tr>";
                        }

                ?>
            </table>
        </section>
</body>
</html>