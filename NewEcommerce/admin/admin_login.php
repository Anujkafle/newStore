<?php
    include('../includes/connnect.php');
    include('../functions/commonfunction.php');
    @session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            body{
                overflow-x:hidden;
            }
        </style>

</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center">Admin Login</h2>
        <div class="row d-flex aligh-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" >
                    <!-- Adminname field -->
                    <div class="form-outline mb-4">         
                        <label for="admin_name" class="form-label">Admin name</label>
                        <input type="text" name="admin_name" id="admin_name" class="form-control" placeholder="Enter Your Admin name" autocomplete="off" required/>
                    </div>
                     <!-- passowrd field -->
                    <div class="form-outline mb-4">                       
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" name="admin_password" id="admin_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required/>
                    </div>
                    
                    <div class="text-center mt-4 pt-2">
                        <input type="submit" value="Login" class="bg-dark py-2 px-3 text-light" name="admin_login">
                        <p class="mt-1 pt-1 small fw-bold">Don't Have an account?<a href="admin_registration.php" class="text-decoration-none text-info"> Register</a></p>
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
    if(isset($_POST['admin_login'])){
        $admin_name=$_POST['admin_name'];
        $admin_password=$_POST['admin_password'];

        $squery="select *  from admin_table where admin_name='$admin_name'";
        $result=mysqli_query($con,$squery);
        $row_count=mysqli_num_rows($result);
        $row_data=mysqli_fetch_assoc($result);
        $ip= getIPAddress();


        if($row_count>0){
            $_SESSION['admin_name']=$admin_name;
            if(password_verify($admin_password,$row_data['admin_password'])){
                if($row_count==1 and $row_count_cart==0){
                    $_SESSION['adminname']=$admin_name;
                    echo "<script>alert('Logged In Successfully')</script>";
                    echo "<script>window.open('index.php','_self')</script>";
                }
            }else{
                echo "<script>alert('Invalid Credentials')</script>";
            }


        }else{
            echo "<script>alert('Invalid Credentials')</script>";
        }

    }


?>
