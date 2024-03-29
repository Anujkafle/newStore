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
    <title>Payment Page</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        img{
            width:80%;
            margin:auto;
            display:block;
        }
        </style>

</head>
<body>
    <!-- php code to access user id -->
        <?php
            $ip= getIPAddress(); 
            $get_user="select * from user_table where user_ip='$ip'";
            $result=mysqli_query($con,$get_user);
            $run_query=mysqli_fetch_array($result);
            $user_id=$run_query['user_id'];


        ?>


    <div class="container">
        <h2 class="text-center text-info">Payment Options</h2>
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col-md-6">
                <?php 
                $total=$_GET["total"];
                ?>
                <a href="esewa.php?total=<?php echo $total ?>" class="m-5 p-3"></a>
                <form action="https://uat.esewa.com.np/epay/main" method="POST">
                <input value="<?php echo $total ?>" name="tAmt" type="hidden">
                <input value="<?php echo $total ?>" name="amt" type="hidden">
                <input value="0" name="txAmt" type="hidden">
                <input value="0" name="psc" type="hidden">
                <input value="0" name="pdc" type="hidden">
                <input value="EPAYTEST" name="scd" type="hidden">
                <input value="ee2c3ca1-696b-4cc5-a6be-2c40d929d45" name="pid" type="hidden">
                <input value="http://merchant.com.np/page/esewa_payment_success?q=su" type="hidden" name="su">/IF SUCCESS GO HERE
                <input value="http://merchant.com.np/page/esewa_payment_failed?q=fu" type="hidden" name="fu">//IF FAIL GO HERE
                <input type= "image" src="../imgs/esewa.jpg" value="Submit" width="40%">
                </form>  
            </div>
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id ?>"  class="text-decoration-none text-center"><h2>Pay offline</h2></a>
            </div>
        </div>



    </div>
</body>
</html>