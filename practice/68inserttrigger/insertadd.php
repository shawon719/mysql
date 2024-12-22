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
            Brand Name:<select name="branddd" >
                <?php
                        $brand=$db->query("select * from brand");
                        while(list($_bid,$_bname)=$brand->fetch_row()){
                            echo "<option value='$_bid'>$_bname</option>";
                        }
                ?>
            </select><br><br>

            <button name="addProduct">ADD</button>
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
                            <tr></tr>
                  ?>
        </table>
      </section>
</body>
</html>