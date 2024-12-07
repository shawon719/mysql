<?php
        include("dbconnect.php");
        if(isset($_GET['id'])){
                $getid=$_GET['id'];
                $sql="SELECT FROM client_det WHERE id=$getid";
                $query=mysqli_query($conn,$sql);
                $data=mysqli_fetch_assoc($query);
                $id=$data['id'];
                $name=$data['name'];
                $add=$data['address'];
        }
        if(isset($_POST['ed'])){
            $id=$_POST['id'];
            $name=$_POST['na'];
            $add=$_POST['ad'];

            $sql1="UPDATE client_det SET name='$name',address='$add' WHERE id='$id' ";
            if(mysqli_query($conn,$sql1)==TRUE){
                    header("location:dataview.php");
                    echo "data update.";
            }else{
                echo $sql1. "data not updadte.";
            }

        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit page</title>
</head>
<body>

    <form action="#" method="post">
        <div>
            Name: <br>
           <input type ="text" name ="na" value="<?php echo $name ?>"><br><br>
        </div>
        <div>
            Address: <br>
            <input type ="text" name ="ad" value="<?php echo $add ?>"><br><br>
        </div>
        <div>
            <input type="text" name="id" value="<?php echo $id ?>" id="" hidden> <br><br>
        </div>
        <div>
            <button name="ed">EDIT</button>
        </div>
    </form>
    
</body>
</html>