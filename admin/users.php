<?php include('components/body.php');?>
    <div class="content">
      
      <div style="width:100%; height:2px;background-color:black;margin-bottom:10px;"></div>
      <div style="width:95%; margin-left:2.3%; margin-bottom:10px; ">
      <h2>Dashboard/Users</h2>
    
     </div>
      <div style="width:95%; margin-left:2.3%; height:2px;background-color:rgb(134,144,153);margin-bottom:10px;"></div>
      <div class="content-2" style="margin-right:20px;">
        <div class="recent_rating">
             <div class="title">
                 <h2>Users</h2>
                 <a href="newuser.php" class="btn">Add New</a>
             </div>
             <table style="width:100%;height:50vh">
            
                 <tr>
                     <th style="width:10px;">No</th>
                     <th>Name</th>
                     <th>email</th>
                     <th>phone</th>
                     <th >Date Added</th>
                     <th>operation</th>
                 </tr>
                 <?php
                    $count =1;
                    $users=mysqli_query($conn, "select * from users where type !='0' and deleted!='1'");
                    while($user=mysqli_fetch_array($users)){
                        
                    ?>
                 <tr >
                     <td style="width:10px;"><?php echo $count;?></td>
                     <td><?php echo $user['username'];?></td>
                     <td><?php echo $user['email'];?></td>
                     <td><?php echo $user['phone'];?></td>
                     <td ><?php echo $user['dateadded'];?></td>
                     <td style="display:flex;"><a href="viewuser.php?id=<?php echo $user['id'];?>" ><img src="icons/view.png" alt="" class="operation"></a><a href="edit_user.php?id=<?php echo $user['id'];?>" ><img src="icons/edit.png" alt="" class="operation"></a><form action="transaction.php" method="post" style="width:30px;"><button style="background:none; border:none;outline:none;width:20px; " name="delete_user" type="submit" ><input type="hidden" name="id" value="<?php echo $user['id'];?>"><img src="icons/trash.png" alt="" class="operation"></button></form></td>
                 </tr>
                 <?php $count++;}?>
                
                 
             </table>
        </div>
        
    </div>
   <!-- include footer  -->
   <?php include('components/footer.php');?>