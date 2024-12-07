<?php
        include("dbconnect.php");
        if(isset($_POST['btn'])){
            $id=$_POST['idd'];
            $name=$_POST['na'];
            $add=$_POST['em'];

            $sql="INSERT INTO client_det(id,name,address) VALUES ('$id','$name','$add')";
            if(mysqli_query($conn,$sql)==TRUE){
                echo "Data inserted.";
                header("location:dataview.php");
            }
            else{
                echo "not inserted.";
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert database</title>
</head>
<body>

        <section>
                <form action="#" method="post">
                    <div>
                        ID: <br>
                        <input type="text" name="idd" id="">
                    </div>
                    <div>
                        Name: <br>
                        <input type="text" name="na">
                    </div> <br>
                    <div>
                        address:
                        <input type="text" name="em" id="">
                    </div>
<div>
                        <button name="btn">submit</button>
                    </div>        
                </form>

        </section>
    
</body>
</html>