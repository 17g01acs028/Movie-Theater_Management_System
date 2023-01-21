<?php include('components/body.php');?>
<div class="alert hide">
		 <div class="ex">
		 <span>!</span></div>
		 <span class="msg" id="global_msg">Setting recorded Updated</span>
		 <span class="close_btn">
			 <span class="cl">x</span>
	    </span>
	 </div>
    <div class="content">
    
      <div style="width:100%; height:2px;background-color:black;margin-bottom:10px;"></div>
      <div style="width:95%; margin-left:2.3%; margin-bottom:10px; ">
      <h2>Dashboard/View Settings</h2>
    
     </div>
      <div style="width:95%; margin-left:2.3%; height:2px;background-color:rgb(134,144,153);margin-bottom:10px;"></div>
      <div class="content-2" style="margin-right:20px;">
        <div class="recent_rating">
             <div class="title">
                 <h2>View settings</h2>
                 <a href="settings.php" class="btn">Back</a>
             </div>
             <div class="container_form">
               <form onsubmit="event.preventDefault();" action="transaction.php" method="post" id="form">
               <div id="error" style="background:red;color:white;width:100%;padding:10px;display:none;position:relative;">
               <p id="error_close" style="position:absolute;right:10px;color:white;width:20px;height:20px;border-radius: 50%;border:1px solid white;text-align:center;">x</p>
                <ul></ul>
               </div>
               <div class="row">
               <?php
                    $id=$_GET['id'];
                    $users=mysqli_query($conn, "select * from settings where id='$id'");
                    while($user=mysqli_fetch_array($users)){
                        
                    ?>
                 <div class="col">
                   <input type="hidden" id="up_id" value="<?php echo $id?>">
                   <div class="input-box">
                     <span>Name</span>
                     <input type="text" placeholder="Name" name="name" id="name" value="<?php echo $user['Name']?>" readonly>
                   </div>
                   
                   
                   
                 </div>
                 <div class="col">
                 <div class="input-box">
                     <span>Value</span>
                     
                     <input type="text" placeholder="value" name="value" id="value" value="<?php echo $user['value']?>" readonly>
                   </div>
                 
                  <?php }?>
                   
                 </div>
                 
                </div>
               
                
                 </form>
               </div>
               
             </div>
        </div>
        
    </div>
    <script>
     

   <!-- include footer  -->
   <?php include('components/footer.php');?>
   