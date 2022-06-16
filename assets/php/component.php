<?php

function demoProduct($productname,$productprice,$productimg,$productid){
    $elements = "

    <div class=\"col-lg-4 col-md-6\">
             <form action=\"\" method=\"post\">
                        <div class=\"coursecard-single\">
                            <div class=\"grids5-info position-relative\">
                                <img src=\"$productimg\" alt=\"\" class=\"img-fluid\" />
                                <div class=\"meta-list\">
                                    <a class=\"bg-warning\" href=\products.html\">Baby Care Products</a>
                                </div>
                            </div>
                            <div class=\"content-main-top\">
                                <div class=\"content-top mb-4 mt-3\">
                                    <ul class=\"list-unstyled d-flex align-items-center justify-content-between\">
                                        <li> <i class=\"fas fa-baby-carriage\" style=\"color: orange\"></i> </li>
                                        <li><i class=\"fas fa-star\" style=\"color: orange\"></i>
                                            <i class=\"fas fa-star\" style=\"color: orange\"></i>
                                            <i class=\"fas fa-star\" style=\"color: orange\"></i>
                                            <i class=\"fas fa-star\" style=\"color: orange\"></i>
                                            <i class=\"fas fa-star-half-alt\" style=\" color: orange\"></i>
                                            4.5
                                        </li>
                                    </ul>
                                </div>
                                <h4><a class=\" \" href=\"\">$productname</a>
                                </h4>
                                <div
                                    class=\"top-content-border d-flex align-items-center justify-content-between mt-4 pt-4\">
                                    <h6>$$productprice</h6>
                                    <button type=\"submit\" class=\"btn btn-style2 text-white\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                                        <input type='hidden' name='product_id' value='$productid'>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
    ";
    echo $elements;
}


function babyCare($productid,$productname,$productprice,$productimg){
    $elements = "
    
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                    <form action=\"\" method=\"post\">
                        <div class=\"card shadow\">
                            <div>
                                <img src=\"$productimg\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                            </div>
                            <div class=\"card-body\">
                                <h5 class=\"card-title\">$productname</h5>
                                <h6>
                                    <i class=\"fas fa-star\"></i>
                                    <i class=\"fas fa-star\"></i>
                                    <i class=\"fas fa-star\"></i>
                                    <i class=\"fas fa-star\"></i>
                                    <i class=\"far fa-star\"></i>
                                </h6>
                                <h5>
                                    <span class=\"price\">$$productprice</span>
                                </h5>

                                <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                                 <input type='hidden' name='product_id' value='$productid'>
                            </div>
                        </div>
                    </form>
                </div>
    ";
    echo $elements;
}

function toys($productid,$productname,$productprice,$productimg){
    $elements = "
    
    <div class=\"col-md-3 col-sm-6 my-3\">
                    <form action=\"\" method=\"post\">
                        <div class=\"card shadow\">
                            <div>
                                <img src=\"$productimg\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                            </div>
                            <div class=\"card-body\">
                                <h5 class=\"card-title\">$productname</h5>
                                <h6>
                                    <i class=\"fas fa-star\"></i>
                                    <i class=\"fas fa-star\"></i>
                                    <i class=\"fas fa-star\"></i>
                                    <i class=\"fas fa-star\"></i>
                                    <i class=\"far fa-star\"></i>
                                </h6>
                                <h5>
                                    <span class=\"price\">$$productprice</span>
                                </h5>

                                <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                                 <input type='hidden' name='product_id' value='$productid'>
                            </div>
                        </div>
                    </form>
                </div>
    ";
    echo $elements;
}

function cartElement($productimg, $productname, $productprice, $productid){
    $element = "

    <div class=\"col-6 py-2\">
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
        <div class=\"border bg-white rounded\">
            <div class=\"row p-2\">
                <div class=\"col-md-5\">
                    <img src=\"$productimg\" alt=\"Image1\" class=\"img-fluid\" style=\"height: 90px;\">
                </div>
                <div class=\"col-md-7\">
                    <h5 class=\"pt-2\">$productname</h5>
                    <small class=\"text-secondary\">Seller: Desh Charity</small>
                    <h5 class=\"pt-2\">$$productprice</h5>
                    
                </div>
                <div class=\"col-md-6 d-block mx-auto my-2\">
                    <div>
                        <button type=\"submit\" class=\"btn btn-danger\" name=\"remove\">Remove Item</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>

    ";
    echo  $element;
}

function OffcanvasCart(){
    $items = count($_SESSION['Cart']);
    $product_id = array_column($_SESSION['Cart'],'product_id');
    require_once ('assets/php/create-db.php');
    $db= new Dbh();
    $db->connect();
    $result1 = $db->getBabyCare('babycare');
    $result2 = $db->getDemoProduct('demoProduct');

    $total = 0;
    while($row = mysqli_fetch_assoc($result1) OR $row = mysqli_fetch_assoc($result2)){
        foreach ($product_id as $id){
            if ($row['id'] == $id){
                $total = $total + (int)$row['product_price'];
            }
        }
    }   

    $element = "
     <div class=\"bg-warning position-fixed top-50 end-0 rounded\" style=\"width: 90px; height: 70px; z-index: 2\"> 
        <button class=\"btn btn-transparent \" style=\"box-shadow: none;\" type=\"button\" data-bs-toggle=\"offcanvas\" data-bs-target=\"#offcanvasRight\" aria-controls=\"offcanvasRight\">
        <i class=\"fas fa-shopping-cart text-primary fs-5 mt-2\"></i>
        <br>
        <b class=\"text-primary\">$items <small>item(s)</small></b>
        </button>

        <div class=\"offcanvas offcanvas-end pt-4 mt-5\" tabindex=\"-1\" id=\"offcanvasRight\" aria-labelledby=\"offcanvasRightLabel\">
        <div class=\"offcanvas-header\">
            <h5 id=\"offcanvasRightLabel\">Cart snippet</h5>
            <button type=\"button\" class=\"btn-close text-reset\" data-bs-dismiss=\"offcanvas\" aria-label=\"Close\"></button>
        </div> 
        
        <div class=\offcanvas-body position-relative\">
             <div class=\"container ps-4 pe-4\">
                <div class=\"row\">
                    <div class=\"col-12 p-0 mb-4 border rounded shadow-sm\">
                        <img src=\"assets/images/deshCharityCover.png\" class=\"img-fluid\">
                    </div>
                    <div class=\"col-8 p-0 mb-5 pb-5\">
                        <h5> Product(s) Quantity : $items</h5>
                        <h5> Product(s) Price : $total</h5>
                    </div>
                    <a class =\"text-white btn btn-primary btn-lg btn-block mt-4\" data-bs-toggle=\"offcanvas\" href=\"./cart.php\" aria-controls=\"offcanvasExample\">
                            Review Cart <i class=\"fas fa-shopping-cart ps-2\"></i> </a>

                    <a style=\"background: #32CD32;\" class =\"text-white btn btn-lg btn-block mt-2\" data-bs-toggle=\"offcanvas\" href=\"./check-out.php\" aria-controls=\"offcanvasExample\">
                            Check Out <i class=\"far fa-credit-card text-primary ps-2\"></i> </a>
                </div>
             </div>
        </div>
        </div>
    </div>
    ";
    echo $element;
}