<!-- connect file -->
<?php
include('../includes/connnect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerece Website Checkout Page </title>
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
    <div class="container-fluid p-0 ">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active fa-solid fa-house" aria-current="page"
                                href="../index.php">&nbsp;Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fa-solid fa-address-book" href="#">&nbsp;Contact</a>
                        </li>


                    </ul>
                    <form class="d-flex" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            name="search_data">
                        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">

                    </form>
                </div>
            </div>
        </nav>

        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
        </nav>

        <!--Third Child-->

        <!-- <div class="bg-light">
            <h3 class="text-center"> Checkout Time </h3>
            <h4 class="text-center">Please Choose the desired Method </h4>

        </div> -->
        <!-- fourth child-->

        <div class="row px-1">
            <div class="col-md-12">
                <!-- products -->
                <div class="row">
                    <?php
                        if(!isset($_SESSION['username'])){
                            include('userlogin.php');
                        }else{
                            echo"<div class='bg-light'>
                            <h3 class='text-center'> Checkout Time </h3>
                            <h4 class='text-center'>Please Choose the desired Method </h4>
                
                        </div>";
                            include('payment.php');
                        }   
                    ?>
                </div>
            </div>
        </div>



        <!-- footer include -->
        <?php include('../includes/footer.php') ?>


    </div>



    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>