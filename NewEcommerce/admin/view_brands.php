<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-dark text-light m-auto">
        <tr>
            <th>S.N.</th>
            <th>Brand Title</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light ">
    <?php
        $select_brand="select * from brands";
        $result=mysqli_query($con,$select_brand);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $brand_id=$row['brand_id'];
            $brand_title=$row['brand_title'];
            $number++;
            ?>        
            <tr>
                <td><?php echo $number; ?></td>
                <td><?php echo $brand_title; ?></td>
            </tr>



       <?php }

?>

    </tbody>
</table>