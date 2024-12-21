<?php
    //  no needed.
    //include("dbcon.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view page</title>
</head>
<body>
<section>
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
            
                $product=$db->query("select * from view_products");
                $count=1;
                while(list($_id,$_prName,$_price,$_manuName,$_cont)=$product->fetch_row()){
                    echo "<tr>
                                <td>$count</td>
                                <td>$_prName</td>
                                <td>$_price</td>
                                <td>$_manuName</td>
                                <td>$_cont</td>
                    </tr>";
                    $count++;
                }
            ?>


        </table>
    </section>
</body>
</html>