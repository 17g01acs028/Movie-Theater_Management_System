<?php include('components/body.php');?>
    <div class="content">
      
      <div style="width:100%; height:2px;background-color:black;margin-bottom:10px;"></div>
      <div style="width:95%; margin-left:2.3%; margin-bottom:10px; ">
      <h2>Dashboard/Reports</h2>
    
     </div>
      <div style="width:95%; margin-left:2.3%; height:2px;background-color:rgb(134,144,153);margin-bottom:10px;"></div>
      <div class="content-2" style="margin-right:20px;display:block;">

      <!-- User Report -->
      <div class="recent_rating" >
             <div class="title" style="display:block">
                 <h2>Bookings</h2>
                 <div class="container_form" style="background:white;margin:0;padding:0;min-width:100px;">
               <form onsubmit="event.preventDefault();" action="transaction.php" method="post" id="form">
               
               <div class="row" style="width:100%;">
               
                 <div class="col">
                   <fieldset >
                  
                   <legend>Record Filter</legend>
                   <div style="padding:10px;display:block;">
                   
                   <div class="input-box" >
                     <span>Limit a Number</span>
                     <input type="text" placeholder="Example 10" style="margin-botton:10px;" id="limit_number">
                   </div>
                   <br>
                   <div class="input-boxz" style="font-size:12px;">
                     <span >Check this <input type="checkbox"  id="d_check" onclick="d_check_in()"> to filter by date, This</span>
                    
                  
                   
                  
                     <input type="checkbox"  id="f_check" onclick="f_check_in()">
                     <span> to filter by Hours</span>
                     </div>
                     

                     <div id="d_ch">
                     <br>
                   <fieldset>
                   
                       <legend>Range(date)</legend>
                       <div style="padding:10px;display:block;">
                   <div class="input-box">
                     <span>From</span>
                     <input type="date" placeholder="start Date" id="s_date">
                   </div>
                   <div class="input-box">
                     <span>to</span>
                     <input type="date" placeholder="End Date" id="e_date">
                   </div>
                   </div>
                   </fieldset>
                   </div>
                   <div id="f_ch">
                   <br>
                   <fieldset>
                  
                       <legend>Filter By hours</legend>
                       <div style="padding:10px;display:block;">
                   <div class="input-box">
                     <span>Select Date</span>
                     <input type="date" placeholder="start Date" id="f_date">
                   </div>

                   <div  style="display:flex;">
               
                 <div  style="width:45%;margin-right:10%;" >
                   <div class="input-box">
                     <span>start</span>
                     <input type="time" placeholder="End Date" id="f_time1">
                   </div>
                </div>
                <div style="width:45%;">
                   <div class="input-box">
                     <span>End</span>
                     <input type="time" placeholder="End Date" id="f_time2">
                   </div>
                </div>
                </div>

                   </div>
                   </fieldset>
                   </div> 
                   </div>
                   
                   </fieldset>
                   
                   
                 </div>
                 <div class="col">
                   <fieldset>
                       <legend>Order By</legend>
                       
                       <div style="padding:10px;display:block;">
                       <div  style="display:flex;">
               
                 <div  style="width:45%;margin-right:10%;" >
                   <div class="input-box">
                     <span>Select Value To Order by</span>
                     <select name="column_order" id="column_order">
                      
                        
                         <option value="userid">User Data</option>
                         <option value="uniqid">Video Data</option>
                         <option value="dateadded">Date added</option>
                     </select>
                   </div>
</div>
<div  style="width:45%;" >
                   <div class="input-box">
                     <span>IN</span>
                     <select name="order_in" id="order_in">
                         <option value="ASC">Ascending order</option>
                         <option value="DESC">Desceding Order</option>
                     </select>
                   </div></div></div>
                   </div>
                   </fieldset>
<div style="margin-bottom:15px;"></div>
                 
                 </div>
                
                 
                </div>
               
                
                <input type="submit" value="Load Data" class="submit-btn" name="update_settings">
                
            </form>
               </div>
                 
             </div>
             <div id="report_div">
             <table style="width:100%;">
             <tr>
                     <th>Number</th>
                     <th>Movie</th>
                     <th>Person</th>
                     <th>Hall</th>
                     <th>Date</th>
                     
                 </tr>
                 <?php
                    $count =1;
                    $users=mysqli_query($conn, "SELECT * FROM `movie_info` ORDER BY `movie_info`.`dateadded` DESC limit 10");
                    while($user=mysqli_fetch_array($users)){
                        $id=$user['uniqid'];
                        $schedules=mysqli_query($conn, "SELECT * FROM schedule where Un_id='$id'");
                        $schedule=mysqli_fetch_array($schedules);

                        echo $user['uniqid '];

                        $userid=$user['userid'];
                        $persons=mysqli_query($conn, "SELECT * FROM users where id='$userid'");
                        $person=mysqli_fetch_array($persons);

                        $mid=$schedule['mid'];
                        $movies=mysqli_query($conn, "SELECT * FROM movies where id='$mid'");
                        $movie=mysqli_fetch_array($movies);

                        $hallid=$schedule['hallid'];
                        $halls=mysqli_query($conn, "SELECT * FROM hall where id='$hallid'");
                        $hall=mysqli_fetch_array($halls);
                    ?>
                 <tr >
                     <td><?php echo $count;?></td>
                     <td><?php echo $movie['mname']; ?></td>
                     <td><?php echo $person['username'];?></td>
                     <td><?php echo $hall['Name'];?></td>
                     <td><?php echo $user['dateadded']?></td>
                     </tr>
                 <?php $count++;}?>
                 
             </table>
                    </div>
        </div>

                    </div>


                    <script>
                       //refresh report variables
const form=document.querySelector("#form");
const limit_number=document.querySelector("#limit_number");
const s_date=document.querySelector("#s_date");
const f_date=document.querySelector("#f_date");
const f_time1=document.querySelector("#f_time1");
const f_time2=document.querySelector("#f_time2");
const e_date=document.querySelector("#e_date");
const column_order=document.querySelector("#column_order");
const order_in=document.querySelector("#order_in");
                      //hide
   function dis_check(){
    document.getElementById('f_ch').style.display="none";
    document.getElementById('d_ch').style.display="none";
   }                   
   dis_check();
  //time date filter
  function f_check_in(){
  f_check=document.getElementById("f_check");
  if(f_check.checked==true){
    
    document.getElementById('f_ch').style.display="block";
    document.getElementById('d_ch').style.display="none";
    d_check.checked=false;
     s_date.value="";
    e_date.value="";
  console.log('checked');
  }else{
    document.getElementById('f_ch').style.display="none";
    console.log('unchecked');
  } }          

    //date filter
  function d_check_in(){
  d_check=document.getElementById("d_check");
  if(d_check.checked==true){
    document.getElementById('d_ch').style.display="block";
    document.getElementById('f_ch').style.display="none";
    f_date.value="";
    f_time1.value="";
    f_time2.value="";
    f_check.checked=false;
  console.log('checked');
  }else{
    document.getElementById('d_ch').style.display="none";
    console.log('unchecked');
  } }           
     

//refresh report details
form.addEventListener("submit", (error)=>{
   
    console.log("here");
    var form_element = error;  	
    var form_data = new FormData();
      form_data.append('limit_number',limit_number.value);	
    	form_data.append('s_date',s_date.value);	
      form_data.append('f_date',f_date.value);	
      form_data.append('f_time1',f_time1.value);	
      form_data.append('f_time2',f_time2.value);	
      form_data.append('e_date',e_date.value);	
      form_data.append('column_order',column_order.value);
      form_data.append('order_in',order_in.value);	
      // document.getElementById('submit').disabled = true;  	
        var ajax_request = new XMLHttpRequest();  	
        ajax_request.open('POST', 'refreshsreports.php');  	
        ajax_request.send(form_data);  
       
        ajax_request.onreadystatechange = function() 	
        
        {
            
            
            if(ajax_request.readyState == 4 && ajax_request.status == 200) 		
            { 
               		
                //document.getElementById('submit').disabled = false;  	
                console.log(ajax_request.responseText);		
                var response = ajax_request.responseText;  
                	console.log(response);
                
                if(response.success != '') 			{ 
                  
                  var target = document.getElementById("report_div");
                    target.innerHTML=response;	
                    
                    } 
                    else { 		
                      var msg="";		
                       		
                      var p=response;
                      for(var key in p){
                        if(p[key]!=""){}
                        msg+=p[key]+"<br>";
                      }
                     console.log(msg);
                     errorDiv_val.innerHTML=msg;
                     errorDiv.style.display='inline-block';
                        }  			 		
            } 	
    }
});

    </script>
   <!-- include footer  -->
   <?php include('components/footer.php');?>