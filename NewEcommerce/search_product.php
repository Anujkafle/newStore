<!-- connect file -->
<?php
include('includes/connnect.php');
include('functions/commonfunction.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Searched Products</title>
    <!-- custom css link -->
    <link rel="stylesheet" href="style.css">
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="./imgs/LG.png" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link fa-solid fa-house" aria-current="page"
                                href="index.php">&nbsp;Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active fa-brands fa-product-hunt" href="display.php">&nbsp;Products</a>
                        </li>
                        <?php
    if(isset($_SESSION['username'])){
        echo "<li class='nav-item'>
        <a class='nav-link fa fa-user' href='./usersarea/profile.php'>&nbsp;My Account</a>
    </li>";
    }else{
        echo "<li class='nav-item'>
        <a class='nav-link fa-solid fa-registered' href='./usersarea/user_registraion.php'>&nbsp;Register</a>
    </li>";
    }

?>
                        <li class="nav-item">
                            <a class="nav-link fa-solid fa-address-book" href="#">&nbsp;Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fa-solid fa-cart-shopping" href="cart.php"><sup>
                                    <?php cart_item(); ?>
                                </sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fa-solid fa-money-bill" href="#">&nbsp;Total Price:
                                <?php total_cart_price(); ?>/-
                            </a>
                        </li>
                    </ul>
                    <form class="d-flex" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            name="search_data" autocomplete="off">
                        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">

                    </form>
                </div>
            </div>
        </nav>

        <!-- calling cart function -->
        <?php
        cart();
        ?>

        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light">
            <ul class="navbar-nav me-auto">

                <?php

if(!isset($_SESSION['username'])){
    echo "<li class='nav-item'>
    <a class='nav-link' href='#'>Welcome Guest</a>
</li>";
}else{
echo"  <li class='nav-item'>
<a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
</li>";
}
                        if(!isset($_SESSION['username'])){
                            echo "<li class='nav-item'>
                                <a class='nav-link' href='./usersarea/user_login.php'>LogIn</a>
                            </li>";
                        }else{
                          echo"  <li class='nav-item'>
                                <a class='nav-link' href='./usersarea/logout.php'>LogOut</a>
                            </li>";
                        }



                    ?>
            </ul>
        </nav>


        <!--Third Child-->

        <div class="bg-light">
            <h3 class="text-center"> Ultimate Store</h3>
            <p class="text-center">The e-commerce platform that cares</p>

        </div>

        <!-- fourth child-->

        <div class="row px-1">
            <div class="col-md-10">
                <!-- products -->
                <div class="row">
                    <!-- fetching products -->
                    <?php
                    // calling function
                    searchproducts();
                    get_unique_categories();
                    get_unique_brands();
                    ?>

                    <!-- row end -->
                </div>
                <!-- column end -->
            </div>

            <!-- sidenav -->
            <div class="col-md-2 bg-secondary p-0">
                <!--Brands to be displayed-->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h4>Brands</h4>
                        </a>
                    </li>
                    <?php
                    getbrands();
                    ?>
                </ul>
                <!--categories-->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h4>Categories</h4>
                        </a>
                    </li>
                    <?php
                    getcategories();
                    ?>
                </ul>

            </div>
        </div>

        <!-- footer include -->
        <?php include('includes\footer.php') ?>


    </div>



    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>