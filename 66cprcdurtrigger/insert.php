<?php
                //database connection.
            $db=new mysqli("localhost","root","","brandn");
            //binding brand table propertise with server using post variable.
        if(isset($_POST["brbtn"])){
            $bname=$_POST["bname"];
            $contact=$_POST["cname"];
            $db->query("call brn('$bname','$contact')");
          
        }
                //binding product table properties with server using post variable
                if(isset($_POST["addpro"])){
                    $pname=$_POST["pname"];
                    $price=$_POST["ppr"];
                    $brid=$_POST["probrand"];
                    $db->query("call proadd('$pname','$price','$brid')");
                   
                 
                }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trigger</title>
</head>
<body>
        <section>
            <h3>this is brand  name table</h3>
            <form action="" method="post">
                Name: <input type="text" name="bname" id=""><br><br>
                Contact:<input type="number" name="cname">
                <button name="brbtn">submit</button>
            </form>
        </section>

        <section>
            <h3>this is product table</h3>
            <form action="" method="post">
                Product Name:<input type="text" name="pname"><br><br>
                Price: <input type="text" name="ppr"><br><br>
                Brand Name:<select name="probrand" id="">
                    <?php
                            $product=$db->query("SELECT * FROM brandname");
                            while(list($_brid,$_brname)=$product->fetch_row()){
                                echo "<option value='$_brid'>$_brname</option>";
                            }
                    ?>
                </select><br><br>
                <button name="addpro">ADD</button>
            </form>
        </section>

        <section>
            <h3>this is view table</h3>
                <table>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Brand Name</th>
                <th>Contact</th>
            </tr>
            <?php
                $product = $db->query("SELECT * FROM product_details");
                $count = 1;
                while ($row = $product->fetch_row()) {
                    list($_id, $_name, $_price, $_bname, $_cont) = $row;
                    echo "<tr>
                            <td>$count</td>
                            <td>$_name</td>
                            <td>$_price</td>
                            <td>$_bname</td>
                            <td>$_cont</td>
                          </tr>";
                    $count++;
                }
            ?>
        </table>
        </section>
</body>
</html>