<?php include('components/body.php');?>
    <div class="content">
      
      <div style="width:100%; height:2px;background-color:black;margin-bottom:10px;"></div>
      <div style="width:95%; margin-left:2.3%; margin-bottom:10px; ">
      <h2>Dashboard/Edit User Details</h2>
    
     </div>
      <div style="width:95%; margin-left:2.3%; height:2px;background-color:rgb(134,144,153);margin-bottom:10px;"></div>
      <div class="content-2" style="margin-right:20px;">
        <div class="recent_rating">
             <div class="title">
                 <h2>Edit User Details</h2>
                 <a href="users.php" class="btn">Back</a>
             </div>
             <div class="container_form">
               <form action="transaction.php" method="post">
                 <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
               
               <div class="row">
               
                 <div class="col">
                 <?php
                    $count =1;
                    $id=$_GET['id'];
                    $users=mysqli_query($conn, "select * from users where id='$id'");
                    while($user=mysqli_fetch_array($users)){
                        
                    ?>
                   <div class="input-box">
                     <span>Full Name</span>
                     <input type="text" placeholder="User Name" name="name" value="<?php echo $user['username'];?>" readonly>
                   </div>
                   <div class="input-box">
                     <span>Email</span>
                     <input type="text" placeholder="Example@gmail.com" name="email" value="<?php echo $user['email'];?>" readonly>
                   </div>
                   <div class="input-box">
                     <span>phone</span>
                     <input type="text" placeholder="07xxxxxxx or 01xxxxxxxx" name="phone" value="<?php echo $user['phone'];?>" readonly>
                   </div>
                   
                 </div>
                 <div class="col">
                 <div class="input-box">
                     <span>Address</span>
                     <textarea name="address" id="" cols="30" rows="10" readonly ><?php echo $user['address'];?></textarea>
                   </div>
                  <?php }?>
                   
                 </div>
                 
                </div>
               
                
                
                 </form>
               </div>
             
        </div>
        
    </div>
   <!-- include footer  -->
   <?php include('components/footer.php');?>