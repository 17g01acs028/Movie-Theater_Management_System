<?php include("../assets/db.php");?>
<table style="width:100%;">
                 <tr>
                     <th>Rating-no <?php echo $_POST['age']?></th>
                     <th>Username</th>
                     <th>Movie Name</th>
                     <th>Rating</th>
                     <th>Date added</th>
                     
                 </tr>
                 <?php
                    $count =1;
                    $movies=mysqli_query($conn, "SELECT * FROM `movie_info`");
                    while($movie=mysqli_fetch_array($movies)){
                        
                    ?>
                 <tr >
                     <td style="width:10px;"><?php echo $count;?></td>
                     <td><?php 
                     $uid=$movie['userid'];
                     $users=mysqli_query($conn, "select * from users where id='$uid'");
                     $user=mysqli_fetch_array($users);
                     echo $user['username'];?></td>
                     <td><?php 
                     $uid=$movie['mid'];
                     $moviesz=mysqli_query($conn, "select * from movies where id='$uid'");
                     $moviez=mysqli_fetch_array($moviesz);
                     echo $moviez['mname'];?></td>
                     <td ><?php echo $movie['rating'];?></td>
                     <td><?php echo $movie['dateadded'];?></td>
                 </tr>
                 <?php $count++;}?>
                 
</table>