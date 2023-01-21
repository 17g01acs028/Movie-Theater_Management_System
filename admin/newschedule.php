<?php include('components/body.php');?>
<div class="alert hide">
		 <div class="ex">
		 <span>!</span></div>
		 <span class="msg" id="global_msg">Schedule Added</span>
		 <span class="close_btn">
			 <span class="cl">x</span>
	    </span>
	 </div>
    <div class="content">
      
      <div style="width:100%; height:2px;background-color:black;margin-bottom:10px;"></div>
      <div style="width:95%; margin-left:2.3%; margin-bottom:10px; ">
      <h2>Dashboard/Schedule</h2>
    
     </div>
      <div style="width:95%; margin-left:2.3%; height:2px;background-color:rgb(134,144,153);margin-bottom:10px;"></div>
      <div class="content-2" style="margin-right:20px;">
        <div class="recent_rating">
             <div class="title">
                 <h2>Schedule Movie</h2>
                 <a href="edit_schedule.php" class="btn">Back</a>
             </div>
             <div class="container_form">
               <form onsubmit="event.preventDefault();" id="form" action="transaction.php" method="post">
               <div id="error" style="background:red;color:white;width:100%;padding:10px;display:none;position:relative;">
               <p id="error_close" style="position:absolute;right:10px;color:white;width:20px;height:20px;border-radius: 50%;border:1px solid white;text-align:center;">x</p>
                <ul></ul>
               </div>
               <div class="row">
               
                 <div class="col">
                   
                   <div class="input-box">
                     <span>Select Movie</span>
                     <select name="movie1" id="s_movie">
                     <?php
                    $count =1;
                    $users=mysqli_query($conn, "select * from movies");
                    while($user=mysqli_fetch_array($users)){
                        
                    ?>
                    <option value="<?php echo $user['id'];?>"><?php echo $user['mname'];?></option>
                     <?php $count++;}?>
                       
                     </select>
                   </div>
                   <div class="input-box">
                     <span>Enter Date</span>
                     <input type="date" placeholder="dd-mm-yyyy" name="date" min="<?php echo date('Y-m-d');?>" id="s_din">
                   </div>
                   <div class="input-box">
                     <span>Enter Date out</span>
                     <input type="date" placeholder="dd-mm-yyyy" name="date1" min="<?php echo date('Y-m-d');?>" id="s_edn">
                   </div>
                   <div class="input-box">
                     <span>Enter Price</span>
                     <input type="text" placeholder="300" name="price" id="s_price">
                   </div>
                 </div>
                 <div class="col">
                 <div class="input-box">
                     <span>Select Hall</span>
                     <select name="hall" id="s_hall">
                     <?php
                    $count =1;
                    $users=mysqli_query($conn, "select * from hall");
                    while($user=mysqli_fetch_array($users)){
                        
                    ?>
                    <option value="<?php echo $user['id'];?>"><?php echo $user['Name'];?></option>
                     <?php $count++;}?>
                       
                     </select>
                   </div>
                 <div class="input-box">
                     <span>Enter Time</span>
                     <input type="time" placeholder="00:00:00" name="time" id="s_tin">
                   </div>
                   <div class="input-box">
                     <span>Enter Time out</span>
                     <input type="time" placeholder="00:00:00" name="time1" id="s_tot">
                   </div>
                   
                 </div>
                 
                </div>
               
                
                <input type="submit" value="Save" class="submit-btn" name="save_schedule">
                 </form>
               </div>
               
             </div>
        </div>
        
    </div>
    <script>
const form=document.querySelector("#form");
const errorDiv_val=document.querySelector("#error ul");
const errorDiv=document.querySelector("#error");
const s_movie=document.querySelector("#s_movie");//movie1
const s_tot=document.querySelector("#s_tot");//time1
const s_tin=document.querySelector("#s_tin");//time
const s_hall=document.querySelector("#s_hall");//hall
const s_din=document.querySelector("#s_din");//date
const s_price=document.querySelector("#s_price");//price
const s_edn=document.querySelector("#s_edn");//date1

const error_close=document.querySelector("#error_close");
const msg=document.querySelector("#global_msg");
error_close.addEventListener("click", ()=>{
  errorDiv.style.display= `none`;
      });

//login validation
form.addEventListener("submit", (error)=>{
   
    console.log("here");
    var form_element = error;  	
    var form_data = new FormData();
      form_data.append('movie1',s_movie.value);	
    	form_data.append('time1',s_tot.value);	
      form_data.append('time',s_tin.value);
      form_data.append('hall',s_hall.value);	
    	form_data.append('date',s_din.value);	
      form_data.append('price',s_price.value);
      form_data.append('date1',s_edn.value);
      form_data.append('save_schedule',"new_hall");
      // document.getElementById('submit').disabled = true;  	
        var ajax_request = new XMLHttpRequest();  	
        ajax_request.open('POST', 'transaction.php');  	
        ajax_request.send(form_data);  
       
        ajax_request.onreadystatechange = function() 	
        
        {
            
            
            if(ajax_request.readyState == 4 && ajax_request.status == 200) 		
            { 
               		
                //document.getElementById('submit').disabled = false;  	
                console.log(ajax_request.responseText);		
                var response = JSON.parse(ajax_request.responseText);  
                	console.log(response);
                
                if(response.success != '') 			{ 
                  
                    fadout();	
                    document.getElementById('form').reset();
                    
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