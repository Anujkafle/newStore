
<h3 class="text-danger m-4">Delete Account</h3>
<form action="" method="post" class="mt-5">
    <div class="form-outline mb-4 w-50 m-auto">
        <input type="submit" value="Delete Account" class="form-control" name="delete">
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <input type="submit" value="Don't Delete Account" class="form-control" name="dont_delete">
    </div>
</form>

<?php
    $username_session=$_SESSION['username'];
    if(isset($_POST['delete'])){
        $delete_query="Delete from user_table where username='$username_session'";
        $result=mysqli_query($con,$delete_query);
        if($result){
            session_destroy();
            echo "<script>alert('Deleted Account Successfully')</script>";
            echo"<script>window.open('../index.php','_self')</script>";
        }
    }
    if(isset($_POST['dont_delete'])){
        echo"<script>window.open('profile.php','_self')</script>";
    
    
    }
?>
