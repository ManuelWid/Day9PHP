<?php
    require_once "actions/db_connect.php";

    $sql = "select * from dishes";
    $result = mysqli_query($connect, $sql);
    $tcontent = "";
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $tcontent .= "<tr>
                <td><img class='img-thumbnail' src='pictures/" .$row['image']."'</td>
                <td>" .$row['name']."</td>
                <td><a href='details.php?dish_id=" .$row['dish_id']."'><button class='btn btn-primary btn-sm' type='button'>Details</button></a>
                <a href='update.php?dish_id=" .$row['dish_id']."'><button class='btn btn-warning btn-sm' type='button'>Edit</button></a>
                <a href='delete.php?dish_id=" .$row['dish_id']."'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>
                </tr>";
        }
    }
    else{
        $tcontent = "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
    }

    mysqli_close($connect);


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP Restaurant</title>
        <?php require_once 'components/boot.php'?>
        <style type="text/css">
            .manageProduct {           
                margin: auto;
            }
            .img-thumbnail {
                width: 70px !important;
                height: 70px !important;
            }
            td {          
                text-align: center;
                vertical-align: middle;
            }
            tr {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="manageProduct w-75 mt-3">    
            <div class='mb-3'>
                <a href= "create.php"><button class='btn btn-primary'type="button" >Add meal</button></a>
            </div>
            <p class='h2'>Meals</p>
            <table class='table table-striped'>
                <thead class='table-success'>
                    <tr>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $tcontent;?>
                </tbody>
            </table>
        </div>
    </body>
</html>