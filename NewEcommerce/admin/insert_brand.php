<?php
 include('../includes/connnect.php');
 if(isset($_POST['insert_brand'])){
    $brand_title=$_POST['brand_title'];
   //select data from database
   $select_query="select * from brands where brand_title='$brand_title' ";
   $select_result=mysqli_query($con,$select_query);
   $num=mysqli_num_rows($select_result);
   if($num>0){
       echo "<script>alert('This Brand is already inside the database')</script>";

   }else{

   $insert_sql="insert into brands (brand_title) values ('$brand_title')";
   $result=mysqli_query($con,$insert_sql);
   if($result){
       echo "<script>alert('Brand Has been inserted successfully')</script>";

   }
}
}
?>

<h2 class="text-center">Insert Brands</h2>

<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" >
    </div>
    <div class="input-group w-10 mb-2 m-auto ">
        <input type="submit" class=" bg-info border-0 p-2 my-3" name="insert_brand" value="Insert Brand">
        
    </div>

</form>