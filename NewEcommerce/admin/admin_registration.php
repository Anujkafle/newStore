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
        <h2 class="text-center"> New admin Registration</h2>
        <div class="row d-flex aligh-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" >
                    <!-- adminname field -->
                    <div class="form-outline mb-4">         
                        <label for="admin_name" class="form-label">Admin Name</label>
                        <input type="text" name="admin_name" id="admin_name" class="form-control" placeholder="Enter Your Admin name" autocomplete="off" required/>
                    </div>
                    <!-- email field -->
                    <div class="form-outline mb-4">                       
                        <label for="admin_email" class="form-label">Email</label>
                        <input type="email" name="admin_email" id="admin_email" class="form-control" placeholder="Enter Your Email" autocomplete="off" required/>
                    </div>
                     <!-- passowrd field -->
                    <div class="form-outline mb-4">                       
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" name="admin_password" id="admin_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required/>
                    </div>
                    <!--  confirm passowrd field -->
                    <div class="form-outline mb-4">                        
                        <label for="conf_admin_password" class="form-label">Confirm-Password</label>
                        <input type="password" name="conf_admin_password" id="conf_admin_password" class="form-control" placeholder="Confirm Your Password" autocomplete="off" required/>
                    </div>
                    <!-- submit button -->
                    <div class="text-center mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-dark py-2 px-3 text-light" name="admin_registration">
                        <p class="mt-1 pt-1 small fw-bold">Don't you Have an account?<a href="admin_login.php" class="text-decoration-none text-info"> Login</a></p>
                    </div>


                </form>
            </div>
        </div>
    </div>




<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>

<?php


    if(isset($_POST['admin_registration'])){
        $admin_name=$_POST['admin_name'];
        $admin_email=$_POST['admin_email'];
        $admin_password=$_POST['admin_password'];
        $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
        $admin_conf_password=$_POST['conf_admin_password'];

        //select query
        $squery="Select * from admin_table where admin_name='$admin_name' or admin_email='$admin_email' ";
        $result=mysqli_query($con,$squery);
        $rows_count=mysqli_num_rows($result);
        if($rows_count>0){
            echo "<script>alert('Admin Name or Email Already Exists')</script>";
        }elseif($admin_password!=$admin_conf_password){
            echo "<script>alert('Password don't match')</script>";
        }
        else{
        // insert query
        $insert_data="insert into  admin_table (admin_name,admin_email,admin_password) values ('$admin_name','$admin_email','$hash_password')";
        $query=mysqli_query($con,$insert_data);
            
        }
    }
?>