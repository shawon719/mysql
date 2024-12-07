<?php
        include("dbconnect.php");
        if(isset($_POST['btn'])){
            $name=$_POST['na'];
            $email=$_POST['em'];

            $sql="INSERT INTO tablename(name,email) VALUES ('$name','$email')";
            if(mysqli_query($conn,$sql)==TRUE){
                echo "Data inserted.";
                header("location:view.php");
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
                <form action="#">
                    <div>
                        Name: <br>
                        <input type="text" name="na">
                    </div> <br>
                    <div>
                        Email:
                        <input type="text" name="em" id="">
                    </div>
                    <div>
                        <button name="btn">submit</button>
                    </div>        
                </form>

        </section>
    
</body>
</html>