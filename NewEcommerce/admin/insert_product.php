<!-- connect file -->
<?php
 include('../includes/connnect.php');
 if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $product_keywords=$_POST['product_keywords'];
    $product_categories=$_POST['product_categories'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_status='true';
    // accessing images
    $product_image1=$_FILES['product_image1']['name'];

    //accessing image template
    $temp_image1=$_FILES['product_image1']['tmp_name'];

    //checking empty condition
    if($product_title=='' or $product_categories=='' or $product_brands=='' or $product_title=='' or $product_price=='' or $product_image1==''){
        echo "<script>alert('Please Fill the required fields')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image1,"./productimgs/$product_image1");

        //insert query
        $insert_products="insert into products (product_title,product_description,product_keyword,category_id,brand_id,product_image1,product_price,date,status) values ('$product_title','$description','$product_keywords','$product_categories','$product_brands','$product_image1','$product_price',NOW(),'$product_status')";
        $query=mysqli_query($con,$insert_products);

        if($query){
            echo "<script>alert('Successfully inserted the product')</script>";
        }
    }

 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product-Admin Dashboard</title>
    <!-- custom css link -->
    <link  rel="stylesheet" href="style.css">
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
    <div class="container mt-3">    
        <h1 class="text-center">Insert Products</h1>
     <!-- form  -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product title" autocomplete="off" required>
            </div>

            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter Product description" autocomplete="off" >
            </div>

            <!-- Keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter Product keywords" autocomplete="off">
            </div>

            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_categories" id="" class="form-select">
                    <option value="">Select A category</option>
                    <?php
                        $select_query="select * from categories";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $category_title=$row['category_title'];
                            $category_id=$row['category_id'];
                            echo "<option value='$category_id'>$category_title </option>";
                        }
                    ?>
                </select>
            </div>
            <!-- brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="form-select">
                    <option value="">Select A Brand</option>
                    <?php
                        $select_query="select * from brands";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $brand_title=$row['brand_title'];
                            $brand_id=$row['brand_id'];
                            echo "<option value='$brand_id'>$brand_title </option>";
                        }
                    ?>
                    
                </select>
                
            </div>
            <!-- Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" placeholder="Please choose an image" required>
            </div>

            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" required>
            </div>

            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" value="Insert Products" name="insert_product" class="btn btn-info mb-3 px-3">
            </div>
        </form>
    </div>

   



<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>