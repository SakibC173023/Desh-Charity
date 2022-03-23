<?php
 session_start();

require_once ('assets/php/create-db.php');
require_once ('assets/php/component.php');

$database = new Dbh();
$database->connect();
$database->createTable('demoProduct');

if (isset($_GET['donationErr']) == 'already-submitted'){
    ?>
    <script>
        alert('Your donation already submitted');
    </script>
    <?php
}
elseif (isset($_GET['donationStts']) == 'donation-success'){
    ?>
    <script>
        alert('Your request has been submitted successfully');
    </script>
    <?php
}
elseif (isset($_GET['packStts']) == 'package-submitted'){
    ?>
    <script>
        alert('Your package form has been submitted successfully');
    </script>
    <?php
}


if (isset($_POST['add'])) {
    if(isset($_SESSION['username'])){
        if (isset($_SESSION['Cart'])){
            $item_array_id = array_column($_SESSION['Cart'], 'product_id');
            if (in_array($_POST['product_id'], $item_array_id))
            {
                if(count($item_array_id) == 8)
                {
                    echo "<script>alert('Cart is full...')</script>";
                    echo "<script>window.location = 'cart.php'</script>";
                }else
                {
                    echo "<script>alert('Product is Already in the Cart...')</script>";
                    echo "<script>window.location = 'index.php'</script>";
                }
            }
            else {
                //$count = count($_SESSION['Cart']); //Count the Current size of array before assigning a new array->($_SESSION['Cart'][0])->size = 1,So $count = 1.
                $item_array = array
                (
                    'product_id' => $_POST['product_id']
                );
                array_push($_SESSION['Cart'],$item_array);
                //$_SESSION['Cart'][$count] = $item_array;
            }
        } else {
            $item_array = array
            (
                'product_id' => $_POST['product_id']
            );
            $_SESSION['Cart'][0] = $item_array;
        }
    }
}
?>

        <!-- Nav-bar Star-->
        <?php 
            include_once 'nav-bar.php';
        ?>
        <!-- Nav-bar End -->

        <!-- banner section -->
        <section id="home" class="banner py-5">
            <div class="banner-content">
                <div class="container py-5 mt-5">
                <h2 class="m-0"><?php if(!isset($_SESSION['username'])) { echo 'Please login before purchase';} ?></h2>
                    <div class="row d-flex align-items-center pt-sm-5 pt-4">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-sm-12">
                            <h1 class="mb-lg-4 mb-3 fw-bold">Men Deserve The<span
                                    class="d-block fw-normal text-warning">Best
                                    Life</span>
                            </h1>
                            <p class="banner-sub">Make Helpless People Smile On Their Faces At Least For a While</p>
                            <div class="d-flex align-items-center buttons-banner">
                                <a href="donate.php" class="btn btn-style mt-lg-2">Donate Now </a>
                            </div>
                        </div>
                        <div
                            class="col-lg-6 col-md-6 col-sm-12 col-sm-12 right-banner-2 text-end position-relative mt-md-0 mt-5">
                            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                                        aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="./assets/images/banner.jpg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-block">
                                            <h5 class="text-white">Happy Children</h5>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="./assets/images/banner3.jpg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-block">
                                            <h5 class="text-white">Boys having fun</h5>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="./assets/images/banner2.jpg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-block">
                                            <h5 class="text-white">Some happy face having Biryani Pack</h5>
                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- //banner section -->

        <!-- home 4grids block -->
        <section class="services-block py-5" id="features">
    <div class="container py-md-5 py-5 mt-4">
        <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
            <h3 class="text-uppercase fw-bold">Our Services</h3>
            <p class="title-style">Let Your Donations With Desh Charity</p>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch">
                <div class="border rounded shadow-lg p-4 d-flex flex-column align-items-center">
                    <div class="my-2"><i class="fas fa-hamburger fs-1" style="color: orange"></i></div>
                    <h4 class="fw-bold my-2"><a class="text-dark " href="donate.php">Donate Food</a></h4>
                    <p class="text-center my-2 lh-lg">Ras effic itur metusga via suscipit consect eturerse adi
                        unde
                        omnis.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mt-md-0 mt-4">
                <div class="border rounded shadow-lg p-4 d-flex flex-column align-items-center">
                    <div class="my-2" style="color: #00a4f5"><i class="fas fa-tshirt fs-1"></i></div>
                    <h4 class="fw-bold my-2"><a class="text-dark " href="donate.php" style="">Donate Clothes</a></h4>
                    <p class="text-center my-2 lh-lg">Ras effic itur metusga via suscipit consect eturerse adi
                        unde omnis.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mt-lg-0 mt-4">
                <div class="border rounded shadow-lg p-4 d-flex flex-column align-items-center">
                    <div class="my-2"><i class="fas fa-shopping-bag fs-1" style="color: orangered"></i></div>
                    <h4 class="fw-bold my-2"><a class="text-dark " href="products.php">Buy Products</a></h4>
                    <p class="text-center my-2 lh-lg">Ras effic itur metusga via suscipit consect eturerse adi
                        unde omnis.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mt-lg-0 mt-4">
                <div class="border rounded shadow-lg p-4 d-flex flex-column align-items-center">
                    <div class="my-2" style="color: #36b051"><i class="fas fa-user-plus fs-1"></i></div>
                    <h4 class="fw-bold my-2"><a class="text-dark " href="volunteer.php">Join as Volunteer</a></h4>
                    <p class="text-center my-2 lh-lg">Ras effic itur metusga via suscipit consect eturerse adi
                        unde omnis.</p>
                </div>
            </div>
        </div>
    </div>
</section>
        <!-- home 4grids block -->

        <!-- Package section start-->
        <section id="package" class="container py-5 mb-5">
            <h3 class="text-uppercase text-center fw-bold mb-4 pb-3">Our Exclusive Donation
                <br><span class="text-warning">Packages</span>
            </h3>
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-4 g-3">
                <!-- first Package -->
                <div class="col mt-5">
                    <div class="card border-0 shadow-sm p-4">
                        <div class="card-body d-flex flex-column ">
                            <h3 class="fw-bold pb-3">&#2547 ৩০০/-</h3>
                            <h3 class="fw-bold">Lite</h3>
                            <p class="package-text">Package includes:</p>
                            <p class="package-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                </svg> T-shirt</p>
                            <p class="package-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                </svg> Lungi</p>
                            <p class="package-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                </svg> Bread</p>
                            <p class="package-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                </svg> Banana half dozen</p>
                            <p class="package-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                </svg> Water bottle - 2L</p>
                            <button type="submit" class="btn btn-outline-secondary border-0 bg-light rounded-pill text-primary fw-bold mt-3"><a class=" " href="package.php?status=fp" target="_blank">Choose Plan</a></button>
                        </div>
                    </div>
                </div>
                <!-- Second Package -->
                <div class="col mt-5">
                    <div class="card border-0 shadow-sm p-4">
                        <div class="card-body d-flex flex-column ">
                            <h3 class="fw-bold pb-3">&#2547 ৫০০/-</h3>
                            <h3 class="fw-bold">Basic</h3>
                            <p class="package-text">Package includes:</p>
                            <p class="package-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                </svg> T-shirt</p>
                            <p class="package-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                </svg> Lungi</p>
                            <p class="package-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                </svg> Bread</p>
                            <p class="package-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                </svg> Banana half dozen</p>
                            <p class="package-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                </svg> Water bottle - 2L</p>
                            <button type="submit" class="btn btn-outline-secondary border-0 bg-light rounded-pill text-primary fw-bold mt-3"><a class=" " href="package.php?status=sp" target="_blank">Choose Plan</a></button>
                        </div>
                    </div>
                </div>
                <!-- Third Package -->
                <div class="col">
                    <div class="card border-0 shadow-sm p-4 pb-5 third-package position-relative">
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">বেস্ট
                            অপশন</span>
                        <div class="card-body marked-package d-flex flex-column">
                            <h3 class="fw-bold pb-3 text-white">&#2547 ৮০০/-</h3>
                            <h3 class="fw-bold text-white">Premium</h3>
                            <p class="text-white">Package includes:</p>
                            <p class="text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                </svg> T-shirt</p>
                            <p class="text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                </svg> Lungi</p>
                            <p class="text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                </svg> Bread</p>
                            <p class="text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                </svg> Banana half dozen</p>
                            <p class="text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                </svg> Water bottle - 2L</p>
                            <button class="btn btn-outline-secondary border-0 bg-light rounded-pill text-primary fw-bold mt-4"
                                type="submit"><a class=" " href="package.php?status=tp" target="_blank">Choose
                                    Plan</a></button>
                        </div>
                    </div>
                </div>
                <!-- fourth Package -->
                <div class="col mt-5">
                    <div class="card border-0 shadow-sm p-4">
                        <div class="card-body d-flex flex-column">
                            <h3 class="fw-bold pb-3">&#2547 ১৫০০/-</h3>
                            <h3 class="fw-bold">Premium +</h3>
                            <p class="package-text">Package includes:</p>
                            <p class="package-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                </svg> T-shirt</p>
                            <p class="package-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                </svg> Lungi</p>
                            <p class="package-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                </svg> Bread</p>
                            <p class="package-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                </svg> Banana half dozen</p>
                            <p class="package-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                </svg> Water bottle - 2L</p>
                            <button class="btn btn-outline-secondary border-0 bg-light rounded-pill text-primary fw-bold mt-3"
                                type="submit"><a class=" " href="package.php?status=fop" target="_blank">Choose
                                    Plan</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- package section end -->

        <!-- Products section -->
<div class="grids-block-5 home-course-bg py-5" id="products">
    <div class="container py-md-5 py-4">
        <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
            <h2 class="text-uppercase fw-bold">Products</h2>
                    <p>Find The Right Products For You</p>
                </div>
                <div class="row justify-content-center">

                <?php
                    $result = $database->getDemoProduct('demoProduct');
                    while($row = mysqli_fetch_assoc($result))
                    {
                        demoProduct($row['product_name'],$row['product_price'],$row['product_image'],$row['id']);
                    }
                ?>

                </div>
                <div class="text-center mt-sm-5 mt-4 pt-sm-0 pt-1">
                    <a class="btn btn-style mt-sm-3" href="products.php">
                        Browse more products <i class="fab fa-searchengin"></i></a>
                </div>
            </div>
        </div>
        <!-- Products section -->

        <!-- home image with content block -->
        <section class="w3l-servicesblock pt-lg-5 pt-4 pb-5" id="volunteer">
            <div class="container pb-md-5 pb-4">
                <div class="row align-items-center">
                    <div class="col-lg-6 position-relative pb-lg-0 pb-5">
                        <div class="position-relative">
                            <img src="assets/images/Volunteer1.jpg" alt="" class="img-fluid radius-image">
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 offset-xl-1 mt-lg-0 mt-5 pt-lg-0 pt-5">
                        <h2 class="text-uppercase fw-bold">Join As Volunteer </h2>
                        <p class="mt-4">Lorem ipsum viverra feugiat. Pellen tesque libero ut justo,
                            ultrices in ligula. Semper at tempufddfel. Lorem ipsum dolor sit amet consectetur
                            adipisicing
                            elit.</p>
                        <ul class="mt-4 pt-lg-1 list-unstyled">
                            <li><i class="fas fa-check-circle primary-clr pe-1"></i>Work with Desh Charity</li>
                            <li><i class="fas fa-check-circle primary-clr pe-1"></i>Gain Volunteering Experience</li>
                            <li><i class="fas fa-check-circle primary-clr pe-1"></i>Help the People</li>
                        </ul>
                        <a href="volunteer.php" class="btn btn-style mt-lg-4" >Join Now <i
                                class="fas fa-arrow-right ps-1"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- //home image with content block -->


        <!-- why choose block -->
    <section class="service-1 py-5">
    <div class="container py-md-5 py-4">
        <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
            <h3 class="text-uppercase fw-bold">Why Choose Us</h3>
            <p class="title-style">Usually, donation’s website people only can donate to NGO’s but in this web
                you can also purchase clothes and toys</p>
        </div>
        <div class="row content23-col-2 text-center">
            <div class="col-md-6">
                <div class="content23-grid content23-grid1">
                    <h4><a href="about.html">Meet the food and clothing needs</a></h4>
                </div>
            </div>
            <div class="col-md-6 mt-md-0 mt-4">
                <div class="content23-grid content23-grid2">
                    <h4><a href="about.html">Prevent food wastage</a></h4>
                </div>
            </div>
        </div>
    </div>
</section>
        <!-- //why choose block -->

        <!-- stats block -->
        <section class="w3-stats pt-4 pb-5" id="stats">
            <div class="container pb-md-5 pb-4">
                <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
                    <p class="text-uppercase">Our Statistics</p>
                    <h1 class="title-style fw-bold">We are Proud to Share with You</h1>
                </div>
                <div class="row text-center pt-4">
                    <div class="col-md-3 col-6">
                        <div class="counter">
                            <img src="assets/images/icon-1.png" alt="" class="img-fluid">
                            <div class="timer count-title count-number mt-sm-1" data-to="6076" data-speed="1500"></div>
                            <p class="count-text">Total Donated Previous Year</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="counter">
                            <img src="assets/images/icon-2.png" alt="" class="img-fluid">
                            <div class="timer count-title count-number mt-3" data-to="6" data-speed="1500"></div>
                            <p class="count-text">Our Branches</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mt-md-0 mt-5">
                        <div class="counter">
                            <img src="assets/images/icon-3.png" alt="" class="img-fluid">
                            <div class="timer count-title count-number mt-3" data-to="30" data-speed="1500"></div>
                            <p class="count-text">Total Volunteer</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mt-md-0 mt-5">
                        <div class="counter">
                            <img src="assets/images/icon-4.png" alt="" class="img-fluid">
                            <div class="timer count-title count-number mt-3" data-to="05" data-speed="1500"></div>
                            <p class="count-text">Awards Won</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- //stats block -->

        <!-- blog block -->
        <div class="py-5" id="blog">
            <div class="container py-md-5 py-4">
                <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
                    <p class="text-uppercase">Our News</p>
                    <h2 class="title-style fw-bold">Latest <span>Blog</span> Posts</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-card-single">
                            <div class="grids5-info">
                                <a href="#blog"><img class="img-fluid" src="assets/images/blog2.jpg" alt="" /></a>
                                <div class="blog-info p-2">
                                    <h4><a href="#blog">Winter Programs...</a></h4>
                                    <p lang="bn">শীতের তীব্রতা বাড়ছে। আসছে শৈত্য প্রবাহ। তবে আগে থেকেই আমরা মানুষের হাতে
                                        হাতে পৌঁছে দিয়েছি উষ্ণতার চাদর। ঠাকুরগাঁও, কুড়িগ্রাম, লালমনিরহাট, সাতক্ষীরা,
                                        রাজশাহী, বরিশাল, খুলনা, রাঙ্গামাটি,খাগড়াছড়ি সহ দেশের বিভিন্ন জেলায় ইতিমধ্যে
                                        পৌঁছে গেছে শীতের কম্বল।</p>
                                    <div class="d-flex align-items-center justify-content-between mt-4">
                                        <a class="d-flex align-items-center" href="#blog" title="23k followers">
                                            <img class="img-fluid" src="" alt="" style="max-width:40px"> <span
                                                class="small ms-2">Mujibur</span>
                                        </a>
                                        <p class="date-text"><i class="far fa-calendar-alt me-1"></i>Oct 06, 2021</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-md-0 mt-4">
                        <div class="blog-card-single">
                            <div class="grids5-info">
                                <a href="#blog"><img class="img-fluid" src="assets/images/blog1.jpg" alt="" /></a>
                                <div class="blog-info p-2">
                                    <h4><a href="#blog">Foods Programs...</a></h4>
                                    <p lang="bn">নিম্ন মধ্যবিত্ত পরিবারগুলোর ঘরে ঘরে বাজার পৌঁছে দেয়ার এই মিশন চলে
                                        প্রতিদিন। আয়ের সাথে ব্যয়ের সামঞ্জস্য করতে না পারা মানুষগুলো মানুষগুলো লোক লজ্জার
                                        ভয়ে কারও
                                        কাছে হাত পাততে পারেন না।
                                        তাই দিন শেষে গোপনে আমরা পৌঁছে দিই ব্যাগ ভর্তি বাজার।</p>
                                    <div class="d-flex align-items-center justify-content-between mt-4">
                                        <a class="d-flex align-items-center" href="#blog" title="23k followers">
                                            <img class="img-fluid" src="" alt="" style="max-width:40px"> <span
                                                class="small ms-2">Habibur</span>
                                        </a>
                                        <p class="date-text"><i class="far fa-calendar-alt me-1"></i>Oct 10, 2021</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-0 mt-4">
                        <div class="blog-card-single">
                            <div class="grids5-info">
                                <a href="#blog"><img class="img-fluid" src="assets/images/blog3.jpg" alt="" /></a>
                                <div class="blog-info p-2">
                                    <h4><a href="#blog">Winter Programs...</a></h4>
                                    <p lang="bn">"আঙ্কেল, আমারে একটা কম্বল দেন, রাতে খুব শীত করে"
                                        টেবিলের আড়ালে শিশুটির মাথার ঝুঁটি ছাড়া কিছুই দেখা যায় না। কিভেবে একা একা এতদূর
                                        এসেছে?
                                        ভাঙ্গা ভাঙ্গা শব্দে কথা বলা শিশুটি অন্তত মিথ্যা বলছে না। অবুঝ বলেই অর্থের চেয়েও
                                        প্রয়োজনটি বড় করে দেখে। </p>
                                    <div class="d-flex align-items-center justify-content-between mt-4">
                                        <a class="d-flex align-items-center" href="#blog" title="23k followers">
                                            <img class="img-fluid" src="assets/images/" alt="" style="max-width:40px">
                                            <span class="small ms-2">Abdul
                                            </span>
                                        </a>
                                        <p class="date-text"><i class="far fa-calendar-alt me-1"></i>Oct 12, 2021</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-sm-5 mt-4 pt-sm-0 pt-1">
            <a class="btn btn-style mt-sm-3" href="news.html">
            Browse more news <i class="fab fa-searchengin"></i></a>
        </div>
                </div>
            </div>
        </div>
        <!-- //blog block -->

      
        <!-- cart Offcanvas start -->
        <?php 
        if(isset($_SESSION['Cart'])){
            if (count($_SESSION['Cart']) > 0) {
                OffcanvasCart(); 
             }
        }
        ?>
        <!-- cart Offcanvas end -->

        <!-- footer block start-->
        <?php require_once 'footer.php'; ?>
        <!-- footer block end-->
