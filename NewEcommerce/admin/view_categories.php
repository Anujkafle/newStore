<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-dark text-light m-auto">
        <tr>
            <th>S.N.</th>
            <th>Category Title</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light ">
    <?php
        $select_cat="select * from categories";
        $result=mysqli_query($con,$select_cat);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $category_id=$row['category_id'];
            $category_title=$row['category_title'];
            $number++;
            ?>        
            <tr>
                <td><?php echo $number; ?></td>
                <td><?php echo $category_title; ?></td>
            </tr>



       <?php }

?>

    </tbody>
</table>