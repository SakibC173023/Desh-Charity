    <!-- Nav-bar Star-->
    <?php 
        session_start();
        
        include_once 'nav-bar.php';
        require_once ('assets/php/create-db.php');
        require_once ('assets/php/component.php');

        $database = new Dbh();
        $database->connect();
        $database->createTable('babyCare');

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
    <!-- Nav-bar End -->


        <!-- courses section -->
        <div class="container py-md-5 py-5">
            <h3 class="mt-5 pt-2 text-center">Find The Right Products For Your Child</h3>
                <div class="row text-center pt-3">
                <p class="text-uppercase fw-bold text-warning">Diaper Collection</p>
                    <?php
                        $result = $database->getBabyCare('babycare');
                            while($row = mysqli_fetch_assoc($result))
                            {
                                babyCare($row['id'],$row['product_name'],$row['product_price'],$row['product_image']);   
                            }
                        ?>  
                </div>

                <div class="row text-center py-5">
                <p class="text-uppercase mt-3 fw-bold text-warning">Toys Collection</p>
                    <?php
                    $result = $database->getToys('toys');
                        while($row = mysqli_fetch_assoc($result))
                        {
                            toys($row['id'],$row['product_name'],$row['product_price'],$row['product_image']);
                            
                        }
                    ?> 
                </div>
         </div>
        <!-- //courses section -->

        <!-- footer block start-->
        <?php
            require_once 'footer.php';
        ?>
        <!-- footer block end-->