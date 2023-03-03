<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-dark text-light">
        <?php
            $get_payment="select* from user_table";
            $result=mysqli_query($con,$get_payment);
            $row_count=mysqli_num_rows($result);
       

            if($row_count==0){
                echo "<h3 class='text-center text-danger'>No Users yet</h3";
            }else{
                echo "
                <tr>
                    <th>S.N.</th>
                    <th>Username</th>
                    <th>User email</th>
                    <th>User Address</th>
                    <th>User Mobile</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody class='bg-secondary text-light text-center'>";
                $number=0;
                while($row_data=mysqli_fetch_assoc($result)){
                    $user_id=$row_data['user_id'];
                    $username=$row_data['username'];
                    $user_email=$row_data['user_email'];
                    $user_address=$row_data['user_address'];
                    $user_mobile=$row_data['user_mobile'];
                    $number++;

                    echo "            
                    <tr>
                        <td>$number</td>
                        <td>$username</td>
                        <td>$user_email</td>
                        <td>$user_address</td>
                        <td>$user_mobile</td>
                        <td><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                </tr>";
                }
            }
        ?>
        
    

    </tbody>
</table>