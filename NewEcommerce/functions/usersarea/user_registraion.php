<?php
    include('../includes/connnect.php');
    include('../functions/commonfunction.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center"> New User Registration</h2>
        <div class="row d-flex aligh-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" >
                    <!-- username field -->
                    <div class="form-outline mb-4">         
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter Your Username" autocomplete="off" required/>
                    </div>
                    <!-- email field -->
                    <div class="form-outline mb-4">                       
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Enter Your Email" autocomplete="off" required/>
                    </div>
                     <!-- passowrd field -->
                    <div class="form-outline mb-4">                       
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required/>
                    </div>
                    <!--  confirm passowrd field -->
                    <div class="form-outline mb-4">                        
                        <label for="conf_user_password" class="form-label">Confirm-Password</label>
                        <input type="password" name="conf_user_password" id="conf_user_password" class="form-control" placeholder="Confirm Your Password" autocomplete="off" required/>
                    </div>
                    <!-- address field -->
                    <div class="form-outline mb-4">         
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" name="user_address" id="user_address" class="form-control" placeholder="Enter Your Address" autocomplete="off" required/>
                    </div>
                    <!-- contact field -->
                    <div class="form-outline mb-4">         
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" name="user_contact" id="user_contact" class="form-control" placeholder="Enter Your Contact Number" autocomplete="off" required/>
                    </div>
                    <!-- submit button -->
                    <div class="text-center mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-dark py-2 px-3 text-light" name="user_register">
                        <p class="mt-1 pt-1 small fw-bold">Already Have an account?<a href="userlogin.php" class="text-decoration-none text-info"> Login</a></p>
                    </div>


                </form>
            </div>
        </div>
    </div>



    <a href="../index.php" class="text-decoration-none"><input type="button" value="Go To Home" class="bg-dark text-light"></a>

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>

<!-- php code -->

<?php


    if(isset($_POST['user_register'])){
        $user_username=$_POST['user_username'];
        $user_email=$_POST['user_email'];
        $user_password=$_POST['user_password'];
        $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
        $user_conf_password=$_POST['conf_user_password'];
        $user_address=$_POST['user_address'];
        $user_contact=$_POST['user_contact'];
        $user_ip=getIPAddress();

        //select query
        $squery="Select * from user_table where username='$user_username' or user_email='$user_email' ";
        $result=mysqli_query($con,$squery);
        $rows_count=mysqli_num_rows($result);
        if($rows_count>0){
            echo "<script>alert('Username or Email Already Exists')</script>";
        }elseif($user_password!=$user_conf_password){
            echo "<script>alert('Password dont match')</script>";
        }
        else{
        // insert query
        $insert_data="insert into  user_table (username,user_email,user_password,user_ip,user_address,user_mobile) values ('$user_username','$user_email','$hash_password','$user_ip','$user_address','$user_contact')";
        $query=mysqli_query($con,$insert_data);
            
        }


        //selecting cart items
        $select_cart_items="Select * from cart_details where ip_address='$user_ip'";
        $cquery=mysqli_query($con,$select_cart_items);
        $rows_count=mysqli_num_rows($cquery);
        if($rows_count>0){
            $_SESSION['username']=$user_username;
            echo "<script>alert('You have items in your cart')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }else{
            echo "<script>window.open('../index.php','_self')</script>";
        }
        
    }

?>