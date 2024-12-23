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
    <title>Insert Add</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #2c3e50;
            text-align: center;
            margin: 20px 0;
        }

        section {
            width: 80%;
            margin: 20px 0;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input, select, button {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        input[type="text"], select {
            width: 100%;
            max-width: 400px;
        }

        button {
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #2c3e50;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #f1c40f;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

    </style>
</head>
<body>
    <div class="container">
        <section>
            <h1>Brand Details</h1>
            <form action="" method="post">
                Brand Name: <input type="text" name="brname" required><br><br>
                Contact: <input type="text" name="con" required><br><br>
                <button name="addBrand">Submit</button>
            </form>
        </section>

        <section>
            <h1>Product Details</h1>
            <form action="" method="post">
                Product Name: <input type="text" name="prname" required><br><br>
                Price: <input type="text" name="pp" required><br><br>
                Brand Name: <select name="branddd" required>
                    <?php
                        $brand=$db->query("select * from brand");
                        while(list($_bid,$_bname)=$brand->fetch_row()){
                            echo "<option value='$_bid'>$_bname</option>";
                        }
                    ?>
                </select><br><br>
                <button name="addProduct">Add</button><br><br>
            </form>

            <form action="" method="post">
                Brand: <select name="delbrand" required>
                    <?php
                        $brand=$db->query("select * from brand");
                        while(list($_bid,$_bname)=$brand->fetch_row()){
                            echo "<option value='$_bid'>$_bname</option>";
                        }
                    ?>
                </select>
                <button name="del">Delete</button>
            </form>
        </section>

        <section>
            <h1>Product View Table</h1>
            <table>
                <tr>
                    <th>Serial</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Brand Name</th>
                    <th>Contact</th>
                </tr>
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
        </section>

        <section>
            <h1>Conditional View Table</h1>
            <table>
                <tr>
                    <th>Serial</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Brand Name</th>
                    <th>Contact</th>
                </tr>
                <?php
                    $product=$db->query("select * from conditional_tab");
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
        </section>
    </div>
</body>
</html>
