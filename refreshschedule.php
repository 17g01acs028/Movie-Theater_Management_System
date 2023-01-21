<?php 
include 'assets/db.php';
session_start();
$date=$_POST['date'];
?>

<table style="width:100%;border: 1px solid white;">
                 <tr>
                     
                     <th>Time</th>
                     <th>Movie</th>
                     <th>Hall</th>
                     <th>Seats</th>
                     <th>Action</th>
                     
                 </tr>
                 <?php
                    $count =1;
                    $users=mysqli_query($conn, "SELECT *,Time(datetime) as date FROM `schedule` where DATE(datetime) ='$date' and seats!='0' ORDER BY `datetime` ASC limit 10");
                    while($user=mysqli_fetch_array($users)){
                        
                    ?>
                 <tr >
                     
                     <td><?php echo $user['date']; ?></td>
                     <td><?php 
                     $users1=mysqli_query($conn,"select * from movies where id=$user[mid]");
                     $username1=mysqli_fetch_array($users1);
                     echo $username1['mname'];
                     
                     ?></td>
                     <td><?php
                      $users1=mysqli_query($conn,"select * from hall where id=$user[hallid]");
                      $username1=mysqli_fetch_array($users1);
                      echo $username1['Name'];
                     ?></td>
                     <td><?php echo $user['seats'];?></td>

                     <td>
                     <?php if(isset($_SESSION['user_id'])){ ?>
                        <button class="main__btn" style="color:white; margin-top:10px; background:blue; "><a href="booking.php?id=<?php echo $user['id']; ?>">Book</a></button>
                <?php }else{?>
                    <a href="login.php" class="btn">login</a>
                  <?php }?> 
                        
                        
                        </td>
                     </tr>
                 <?php $count++;}?>
                 
                 
             </table>