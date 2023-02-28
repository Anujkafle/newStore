
<!-- connect file -->
<?php
 include('includes/connnect.php');
 include('functions/commonfunction.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Details</title>
    <!-- custom css link -->
    <link  rel="stylesheet" href="style.css">
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .cart_img{
        width: 80px;
        height: 80px;
        object-fit:contain;
        }
    </style>



</head>
<body>
    <!-- navbar -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
           <img src="./imgs/LG.png"  class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link  fa-solid fa-house" aria-current="page" href="index.php">&nbsp;Home</a>
            </li>
            <li class="nav-item">
             <a class="nav-link fa-brands fa-product-hunt" href="display.php">&nbsp;Products</a>
            </li>
            <li class="nav-item">
             <a class="nav-link fa-solid fa-registered" href="#">&nbsp;Register</a>
            </li>
            <li class="nav-item">
             <a class="nav-link fa-solid fa-address-book" href="#">&nbsp;Contact</a>
            </li>
            <li class="nav-item">
             <a class="nav-link active fa-solid fa-cart-shopping" href="cart.php"><sup><?php cart_item(); ?></sup></a>
            </li>
             <!-- <li class="nav-item">
             <a class="nav-link fa-solid fa-money-bill" href="#">&nbsp;Total Price: <?php total_cart_price(); ?>/-</a>
            </li> -->
        </ul>
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
        <li class="nav-item">
            <a class="nav-link" href="#">Welcome Guest</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="usersarea/userlogin.php">Login</a>
        </li>
    </ul>
</nav>


<!--Third Child-->

<div class="bg-light">
    <h3 class="text-center"> Ultimate Store</h3>
    <p class="text-center">The e-commerce platform that cares</p> 

</div>

<!-- fourth child table -->
  <div class="container">
    <div class="row">   
        <form action="" method="post">
            <table class="table table-bordered text-center">
                
                <tbody>
                 <!-- php code to fetch data from database -->
                    <?php
                    $ip = getIPAddress();
                    $total=0;
                    $cart_query="select * from cart_details where ip_address='$ip'";
                    $result=mysqli_query($con,$cart_query);
                    $result_count=mysqli_num_rows($result);
                    if($result_count>0){
                        
                            echo "
                            <thead>
                                <tr>
                                    <th>Product Title</th>
                                    <th>Product Image</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Remove</th>
                                    <th colspan='2'>Operations</th>
                                </tr>
                            </thead>";


                        
                        while($row=mysqli_fetch_array($result)){
                            $product_id =$row['product_id'];
                            $select_products="select * from products where product_id='$product_id'";
                            $result_products=mysqli_query($con,$select_products);
                            while($row_product_price=mysqli_fetch_array($result_products)){
                                $product_price=array($row_product_price['product_price']);
                                $price_table=$row_product_price['product_price'];
                                $product_title=$row_product_price['product_title'];
                                $product_image1=$row_product_price['product_image1'];
                                $product_values=array_sum($product_price);
                                $total+=$product_values;
                    ?>

                        <tr>
                            <td><?php echo $product_title; ?></td>
                            <td><img src="./admin/productimgs/<?php echo $product_image1; ?>" alt="" class="cart_img"></td>
                            <td><input type="text" name="qty" class="form-input w-50"></td>
                            <?php
                                $ip = getIPAddress();
                                if(isset($_POST['update_cart'])){
                                    $quantities=$_POST['qty'];
                                    $update_cart="update cart_details set quantity='$quantities' where ip_address='$ip'";
                                    $result_products_quantity=mysqli_query($con,$update_cart);
                                    $total=$total*$quantities;
                                }
                            ?>
                            <td><?php echo $price_table; ?>/-</td>
                            <td><input type="checkbox" name="remove_item[]" value="<?php echo $product_id;  ?>"></td>
                            <td>
                               
                                <input type="submit" value="Update Cart" class="bg-info px-3 py-2 text-light b-0" name="update_cart">
                                <!-- <button class="bg-info mx-3 px-3 py-2 text-light b-0">Remove</button> -->
                                <input type="submit" value="Remove Cart" class="bg-info mx-3 px-3 py-2 text-light b-0" name="remove_cart">
                            </td>
                        </tr>
                    <?php }}}
                    else{
                        echo"<h2 class='text-center text-danger'>Cart is Empty</h2>";
                    } ?>
                </tbody>

            </table>         
            <!-- sub total -->
            <div class="d-flex mb-3">
                <?php
                    $ip = getIPAddress();
                    
                    $cart_query="select * from cart_details where ip_address='$ip'";
                    $result=mysqli_query($con,$cart_query);
                    $result_count=mysqli_num_rows($result);
                    if($result_count>0){
                        echo "<h4 class='px-3'>SubTotal:&nbsp;&#8360;<strong > $total/-</strong></h4>
                        <input type='submit' value='Continue Shopping' class='bg-dark px-3 py-2 text-light b-0' name='continue_shopping'>
                        <button class='bg-danger mx-3 px-3 py-2 text-light b-0'><a href='./usersarea/checkout.php' class='text-light text-decoration-none'>Checkout</a> </button>";
                    }else{
                        echo" <input type='submit' value='Continue Shopping' class='bg-dark px-3 py-2 text-light b-0'name='continue_shopping'>";

                    }
                    if(isset($_POST['continue_shopping'])){
                        echo "<script>window.open('index.php','_self')</script>";
                    }
                ?>
                
            </div>
         
        </div>
      </div>
    </form>
    <!-- function to remove item -->
    <?php
        function remove_cart_item(){
                global $con;
                if(isset($_POST['remove_cart'])){
                    foreach($_POST['remove_item'] as $remove_id){
                        echo $remove_id;
                        $delete_query="Delete from cart_details where product_id='$remove_id'";
                        $run_delete=mysqli_query($con,$delete_query);
                        if($run_delete){
                            echo "<script>window,open('cart.php','_self')</script>";
                        }
                    }
                }

        }
        echo $remove_item=remove_cart_item();


    ?>
</div>
   
<!-- footer include -->
<?php  include('includes\footer.php') ?>
 
    

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>