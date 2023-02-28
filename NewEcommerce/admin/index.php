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
        .footer{
            position: absolute;
            bottom: 0;
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
                            <a href="" class="nav-link"><h4>Welcome Guest</h4></a>
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
                    <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-dark my-1">Insert Products</a></button>
                    <button><a href="" class="nav-link text-light bg-dark my-1">View Products</a></button>
                    <button><a href="index.php?insert_cat" class="nav-link text-light bg-dark my-1">Insert Categories</a></button>
                    <button><a href="" class="nav-link text-light bg-dark my-1">View Categories</a></button>
                    <button><a href="index.php?insert_brands" class="nav-link text-light bg-dark my-1">Insert Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-dark my-1">View Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-dark my-1">All Orders</a></button>
                    <button><a href="" class="nav-link text-light bg-dark my-1">All Payments</a></button>
                    <button><a href="" class="nav-link text-light bg-dark my-1">List users</a></button>
                    <button><a href="" class="nav-link text-light bg-dark my-1">Log-Out</a></button>
                </div>
            </div>
        </div>
        <!-- fourth child-->
        <div class="container my-3">
        <?php
            if(isset($_GET['insert_cat'])){
                include('insert_cat.php'); 
            }
            if(isset($_GET['insert_brands'])){
                include('insert_brand.php'); 
            }
        ?>
        </div>
    </div>
    
<!-- last child-->
<div class="bg-info p-3 text-center footer">
    <p> All Rights Reserved  -- Designed by Anuj Kafle</p>
</div>

 <!-- bootstrap js link -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>