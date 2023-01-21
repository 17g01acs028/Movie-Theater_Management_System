<?php include('components/body.php');?>
    <div class="content">
      
      <div style="width:100%; height:2px;background-color:black;margin-bottom:10px;"></div>
      <div style="width:95%; margin-left:2.3%; margin-bottom:10px; ">
      <h2>Dashboard/View Movie Details</h2>
    
     </div>
      <div style="width:95%; margin-left:2.3%; height:2px;background-color:rgb(134,144,153);margin-bottom:10px;"></div>
      <div class="content-2" style="margin-right:20px;">
        <div class="recent_rating">
             <div class="title">
                 <h2>Movie Details</h2>
                 <a href="movie.php" class="btn">Back</a>
             </div>
             <div class="container_form">
               <form action="transaction.php" method="post" enctype="multipart/form-data">
               <div class="row">
                 <div class="col">
                 <?php
                    $count =1;
                    $id=$_GET['id'];
                    $movies=mysqli_query($conn, "select * from movies where id=$id");
                    while($movie=mysqli_fetch_array($movies)){
                        
                    ?>
                   <div class="input-box">
                     <span>Full Movie Name</span>
                     <input type="text" placeholder="Movie Name" name="name" value="<?php echo $movie['mname']; ?> " readonly>
                   </div>
                   <div class="input-box">
                     <span>Director</span>
                     <input type="text" placeholder="Director" name="director" value="<?php echo $movie['director'] ?>" readonly>
                   </div>
                   
                   <div class="input-box">
                     <span>Movie Profile Upload</span>
                     
                     
                     <div class="pic_preview" style="width:430px;height:200px;border:1px solid rgb(119,115,128); margin-top:10px;">
                     <img src="<?php echo $movie['img']; ?>" width="430" height="200">
                     </div>
                   </div>
                   
                 </div>
                 <div class="col">
                 <div class="input-box">
                     <span>Movie Video Clip Upload</span>
                     
                     <div class="movie_preview" style="width:450px;height:250px;border:1px solid rgb(119,115,128); margin-top:10px;">
                     <video width="100%" height="250" controls>
					<source src="<?php echo $movie['movie']?>">
				</video>
                     </div>
                   </div>
                   <div class="input-box">
                     <span>Description</span>
                     <textarea name="description" id="" cols="30" rows="10" readonly><?php echo $movie['description'] ?></textarea>
                   </div>
                   
                 </div>
                 
                </div>
              
                 </form>
                 <?php }?>
               </div>
               
             </div>
        </div>
        
    </div>
   <!-- include footer  -->
   <?php include('components/footer.php');?>