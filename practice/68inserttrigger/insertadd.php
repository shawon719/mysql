<?php
        include("dbcon.php");

        if(isset($_POST["addBrand"])){
            $bname=$_POST["brname"];
            $contact=$_POST["con"];
            $db->query("call bradd('$bname','$contact')");
        }

        if(isset($_POST["addProduct"])){
            $pname=$_POST["prname"];
            $price=$_POST["pp"];
            
            $bid=$_POST["branddd"];
            $db->query("call proadd('$pname','$price','$bid')");
        }

        if(isset($_POST["del"])){
            $bid=$_POST["delbrand"];
            $db->query("delete from brand where id='$bid' ");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert add</title>
</head>
<body>
    <section>
        <h1>brand details</h1>
            <form action="" method="post">
                Brand Name:<input type="text" name="brname"><br><br>
                Contact:<input type="text" name="con"><br><br>
                <button name="addBrand">Submit</button>
            </form>
    </section>

    <!-- this section is for product -->
     <section>
        <h1>product details</h1>
        <form action="" method="post">
            Product Name:<input type="text" name="prname"><br><br>
            Price:<input type="text" name="pp"><br><br>
            <!-- Brand Name:<input type="text" name="brname"><br><br> -->
            Brand Name:<select name="branddd" >
                <?php
                        $brand=$db->query("select * from brand");
                        while(list($_bid,$_bname)=$brand->fetch_row()){
                            echo "<option value='$_bid'>$_bname</option>";
                        }
                ?>
            </select>

            <button name="addProduct">ADD</button><br><br>
           
        </form>

        <form action="" method="post">
            Brand:<select name="delbrand">
                <?php
                        $brand=$db->query("select * from brand");
                        while(list($_bid,$_bname)=$brand->fetch_row()){
                            echo "<option value='$_bid'>$_bname</option>";
                        }
                ?>
            </select>
            <button name="del">delete</button>
        </form>
     </section>
        <!-- this is view table -->
      <section>
        <h1>this is view table</h1>
        <table border="1" style="border-collapse:collapse">
                        <tr>
                            <td>Serial</td>
                            <td>Product Name</td>
                            <td>Product Price</td>
                            <td>Brand Name</td>
                            <td>Contact</td>
                        </tr>

                  <?php
                            // $product=$db->query("select * from  product_view");
                            // while(list($_id,$_pname,$_pprice,$_brname,$_contact)=$product->fetch_row()){
                            //     echo "<tr>
                            //                 <td>$_id</td>
                            //                 <td>$_pname</td>
                            //                 <td>$_pprice</td>
                            //                 <td>$_brname</td>
                            //                 <td>$_contact</td>
                                
                            //     </tr>";
                            // }
                  ?>
                  <?php
            
                        $product=$db->query("select * from product_view");
                        $count=1;
                        while(list($_id,$_prName,$_price,$_brandName,$_cont)=$product->fetch_row()){
                            echo "<tr>
                                        <td>$count</td>
                                        <td>$_prName</td>
                                        <td>$_price</td>
                                        <td>$_brandName</td>
                                        <td>$_cont</td>
                            </tr>";
                            $count++;
                        }
                ?>
        </table>
      </section><br><br>
      <section>
        <table border="1" style="border-collapse:collapse">
                        <tr>
                            <td>Serial</td>
                            <td>Product Name</td>
                            <td>Product Price</td>
                            <td>Brand Name</td>
                            <td>Contact</td>
                        </tr>
                        <?php
                            $product=$db->query("select * from conditional_tab");
                                $count=1;
                                while(list($_id,$_prName,$_price,$_brandName,$_cont)=$product->fetch_row()){
                                   $_id=$count;
                                    echo "<tr>
                                                <td>$_id</td>
                                                <td>$_prName</td>
                                                <td>$_price</td>
                                                <td>$_brandName</td>
                                                <td>$_cont</td>
                                    </tr>";
                                    $count++;
                                }
                        ?>
        </table>
      </section>
</body>
</html>