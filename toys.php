<?php
session_start();

require_once ('assets/php/create-db.php');
require_once ('assets/php/component.php');

$database = new Dbh();
$database->connect();
$database->createTable('toys');

if(isset($_POST['add'])){
    if(isset($_SESSION['username'])){
        if (isset($_SESSION['Cart'])){
            $item_array_id = array_column($_SESSION['Cart'],'product_id');
            if (in_array($_POST['product_id'],$item_array_id))
            {
                if(count($item_array_id) == 15){
                    echo "<script>alert('Cart is full...')</script>";
                    echo "<script>window.location = 'cart.php'</script>";
                }else
                {
                    echo "<script>alert('Product is Already in the Cart...')</script>";
                    echo "<script>window.location = 'baby-care.php'</script>";
                }
            }else
            {
                $count = count($_SESSION['Cart']);
                $item_array = array
                (
                    'product_id' => $_POST['product_id']
                );

                $_SESSION['Cart'][$count] = $item_array;
            }
        }else
        {
            $item_array = array
            (
                    'product_id' => $_POST['product_id']
            );

            $_SESSION['Cart'][0] = $item_array;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/cart.css">
</head>
<body>

<?php
    require_once ('assets/php/cart-header.php');
?>
<div class="container">
    <div class="row text-center py-5">
        <?php
           $result = $database->getToys('toys');
            while($row = mysqli_fetch_assoc($result))
            {
                toys($row['id'],$row['product_name'],$row['product_price'],$row['product_image']);
                
            }
         ?> 
    </div>
</div>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>