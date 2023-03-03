<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view_products</title>
</head>
<body>
    <h1 class="text-center text-success ">All Products</h1>
    <table class="table table-bordered mt-5">
        <thead class="bg-dark text-light">
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Price</th>
            <th>Total Sold</th>
            <th>Status</th>
        </thead>
   
    <tbody class="bg-secondary text-light">

    <?php
        $get_products="Select * from products";
        $result=mysqli_query($con,$get_products);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_price=$row['product_price'];
            $status=$row['status'];
            $number++;
            ?>
            <tr class='text-center'>
            <td><?php echo $number; ?></td>
            <td><?php echo $product_title; ?></td>
            <td><?php echo $product_price; ?></td>
            <td>
                <?php
                    $get_count="Select * from orders_pending where product_id=$product_id";
                    $result_count=mysqli_query($con,$get_count);
                    $rows_count=mysqli_num_rows($result_count);
                    echo $rows_count;

                ?>
            </td>
            <td><?php echo $status; ?></td>
        </tr>


    <?php    }


?>

    </tbody>
    </table>
</body>
</html>