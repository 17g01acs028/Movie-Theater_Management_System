<?php include('components/body.php');?>
    <div class="content">
      
      <div style="width:100%; height:2px;background-color:black;margin-bottom:10px;"></div>
      <div style="width:95%; margin-left:2.3%; margin-bottom:10px; ">
      <h2>Dashboard/Movies</h2>
    
     </div>
      <div style="width:95%; margin-left:2.3%; height:2px;background-color:rgb(134,144,153);margin-bottom:10px;"></div>
      <div class="content-2" style="margin-right:20px;">
        <div class="recent_rating">
             <div class="title">
                 <h2>Movies</h2>
                 <a href="newMovie.php" class="btn">Add New</a>
             </div>
             <table style="width:100%;">
                 <tr>
                     <th>Movie-ID</th>
                     <th>Movie Name</th>
                     <th>Director</th>
                     <th>Date added</th>
                     <th>operation</th>
                 </tr>
                 <?php
                    $count =1;
                    $users=mysqli_query($conn, "select * from movies where deleted!='1'");
                    while($user=mysqli_fetch_array($users)){
                        
                    ?>
                 <tr >
                     <td style="width:10px;"><?php echo $count;?></td>
                     <td><?php echo $user['mname'];?></td>
                     <td><?php echo $user['director'];?></td>
                     <td ><?php echo $user['dateadded'];?></td>
                     <td style="display:flex;"><a href="viewmovie.php?id=<?php echo $user['id'];?>" ><img src="icons/view.png" alt="" class="operation"></a><a href="edit_movie.php?id=<?php echo $user['id'];?>" ><img src="icons/edit.png" alt="" class="operation"></a><form action="transaction.php" method="post" style="width:30px;"><button style="background:none; border:none;outline:none;width:20px; " name="delete_movie" type="submit" ><input type="hidden" name="id" value="<?php echo $user['id'];?>"><img src="icons/trash.png" alt="" class="operation"></button></form></td>
                 </tr>
                 <?php $count++;}?>
             </table>
        </div>
        
    </div>
   <!-- include footer  -->
   <?php include('components/footer.php');?>