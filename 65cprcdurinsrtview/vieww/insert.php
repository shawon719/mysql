<?php
    //database connection
    $dbcon=new mysqli('localhost','root','','newbrandtab');
    
    //this code insert data to database
    if(isset($_POST['btn'])){
        $bname=$_POST['bname'];
        $contact=$_POST['contact'];
        $dbcon->query("call br('$bname','$contact')");

    }//end of inserting formula

    //this code will show 
    if(isset($_POST['addproduct'])){
        $pname=$_POST['pnam'];
        $pprice=$_POST['pp'];
        $b_id=$_POST['brid'];
        $mid=$_POST['product'];
        $dbcon->query("call pro('$pname','$pprice','$b_id','$mid')");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>procedure way insert</title>
</head>
<body>
        <section>
            <h3>this is brand table</h3>
            <form action="#" method="post">
                <table>
                    <tr>
                        <td><label for="nam">Name:</label></td>
                        <td><input type="text" name="bname" id="nam"></td>
                    </tr>
                    <tr>
                        <td><label for="con">Contact:</label></td>
                        <td><input type="text" name="contact" id="con"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button name="btn">Submit</button></td>
                    </tr>
                </table>
            </form>
        </section>

        <section>
            <h3>this is product table</h3>
            <form action="#" method="post">
                <table>
                    <tr>
                        <td><label for="pname">Name:</label></td>
                        <td><input type="text" name="pnam" id="pname"></td>
                    </tr>
                    <tr>
                        <td><label for="pprice">Price:</label></td>
                        <td><input type="text" name="pp" id="pprice"></td>
                    </tr>
                    
                    <tr>
                        <td><label for="prod">brand Name</label></td>
                        <td>
                            <select name="product" id="prod">
                                <?php
                                        $product= $dbcon->query("select * from brandtab");
                                        while(list($_mid,$_name)=$product->fetch_row()){
                                            echo "<option value='$_mid'>$_name</option>";
                                        }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="bid">Brand id</label></td>
                        <td><input type="text" name="brid" id=""></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button name="addproduct">Add Product</button></td>
                    </tr>
                </table>
            </form>
        </section>
</body>
</html>