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
    <title>Admin Dashboard</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- css link -->
    <link rel="stylesheet" href="../style.css" >
    <!-- font swesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style>
        /* .footer{
            position: absolute;
            bottom: 0;
        } */
        body{
            overflow-x: hidden;
        }
        .product_img{
            width:100px;
            object-fit:contain;
        }
    </style>
</head>
<body>
    <!--nav bar-->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../imgs/LG.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg ">
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                        <?php
                        if(isset($_SESSION['admin_name'])){
                        echo"  <li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome ".$_SESSION['admin_name']."</a>
                    </li>";
                        }
                    ?>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!--second child-->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>
        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="px-5">
                    <a href="#" ><img src="../imgs/Logo.png" alt="" class="adminimg"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center px-5">
                    <button class="my-3"><a href="index.php?insert_product" class="nav-link text-light bg-dark my-1">Insert Products</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light bg-dark my-1">View Products</a></button>
                    <button><a href="index.php?insert_cat" class="nav-link text-light bg-dark my-1">Insert Categories</a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-light bg-dark my-1">View Categories</a></button>
                    <button><a href="index.php?insert_brands" class="nav-link text-light bg-dark my-1">Insert Brands</a></button>
                    <button><a href="index.php?view_brands" class="nav-link text-light bg-dark my-1">View Brands</a></button>
                    <button><a href="index.php?list_orders" class="nav-link text-light bg-dark my-1">All Orders</a></button>
                    <button><a href="index.php?list_payments" class="nav-link text-light bg-dark my-1">All Payments</a></button>
                    <button><a href="index.php?list_users" class="nav-link text-light bg-dark my-1">List users</a></button>
                    <button><a href="admin_logout.php" class="nav-link text-light bg-dark my-1">Log-Out</a></button>
                </div>
            </div>
        </div>
        <!-- fourth child-->
        <div class="container my-3">
        <?php
                if(isset($_GET['insert_product'])){
                    include('insert_product.php'); 
                }
            if(isset($_GET['insert_cat'])){
                include('insert_cat.php'); 
            }
            if(isset($_GET['insert_brands'])){
                include('insert_brand.php'); 
            }
            if(isset($_GET['view_products'])){
                include('view_products.php'); 
            }
            if(isset($_GET['view_categories'])){
                include('view_categories.php'); 
            }
            if(isset($_GET['view_brands'])){
                include('view_brands.php'); 
            }
            if(isset($_GET['list_orders'])){
                include('list_orders.php'); 
            }
            if(isset($_GET['list_payments'])){
                include('list_payments.php'); 
            }
            if(isset($_GET['list_users'])){
                include('list_users.php'); 
            }
        ?>
        </div>
    </div>
    
<!-- last child-->
<!-- <div class="bg-info p-3 text-center footer">
    <p> All Rights Reserved  -- Designed by Anuj Kafle</p>
</div> -->
      <!-- footer include -->
      <?php include('../includes/footer.php') ?>

 <!-- bootstrap js link -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>