<!-- connect file -->
<?php
include('../includes/connnect.php');
include('../functions/commonfunction.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username'] ?></title>
    <!-- custom css link -->
    <link rel="stylesheet" href="style.css">
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    body{
        overflow-x:hidden ;
    }
    .logo{
    width: 5%;
    height: 5%;
}
img{
    margin:auto;
    display:block;
    
}
</style>

</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../imgs/LG.png" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active fa-solid fa-house" aria-current="page"
                                href="../index.php">&nbsp; Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fa-brands fa-product-hunt" href="../display.php">&nbsp; Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fa fa-user" href="profile.php">&nbsp; My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fa-solid fa-cart-shopping" href="../cart.php"><sup>
                                    <?php cart_item(); ?>
                                </sup></a>
                        </li>
                    </ul>
                    <form class="d-flex" action="../search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            name="search_data">
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
                                <a class='nav-link' href='./usersarea/userlogin.php'>LogIn</a>
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
            <h3 class="text-center">Welcome to your Profile</h3>           
        </div>

        <!-- fourth child-->
        <div class="row">
                            
            <div class="col-md-2">
                <ul class="navbar-nav bg-dark text-center" style="height:100vh">
                    <li class="nav-item bg-info">
                        <a class="nav-link text-light " href="#" ><h4>Your profile</h4></a>
                    </li>
                    <li class="nav-item bg-info mb-3">
                        <img src="../imgs/customer small.png" alt="">
                    </li>
                    <li class="nav-item bg-dark mb-3">
                        <a class="nav-link text-light " href="profile.php" >Pending Orders</a>
                    </li>
                    <li class="nav-item bg-dark mb-3">
                        <a class="nav-link text-light " href="profile.php?my_orders" >My orders</a>
                    </li>
                    <li class="nav-item bg-dark mb-3">
                        <a class="nav-link text-light " href="profile.php?delete_account" >Delete Account</a>
                    </li>
                    <li class="nav-item bg-dark mb-3">
                        <a class="nav-link text-light " href="logout.php" >Log out</a>
                    </li>
                </ul>
            </div>
                <div class="col-md-10 text-center">
                    <?php get_user_order_details();
                        if(isset($_GET['my_orders'])){
                            include('user_orders.php');
                        }
                        if(isset($_GET['delete_account'])){
                            include('delete_account.php');
                        }
                    
                    ?>
                </div>

        </div>
  
        <!-- footer include -->
        <?php include('../includes\footer.php') ?>


    </div>



    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>