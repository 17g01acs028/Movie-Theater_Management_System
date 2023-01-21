<?php include('components/body.php');?>
<div class="alert hide">
		 <div class="ex">
		 <span>!</span></div>
		 <span class="msg" id="global_msg">Hall Record Updated</span>
		 <span class="close_btn">
			 <span class="cl">x</span>
	    </span>
	 </div>
    <div class="content">
      
      <div style="width:100%; height:2px;background-color:black;margin-bottom:10px;"></div>
      <div style="width:95%; margin-left:2.3%; margin-bottom:10px; ">
      <h2>Dashboard/Add HAll</h2>
    
     </div>
      <div style="width:95%; margin-left:2.3%; height:2px;background-color:rgb(134,144,153);margin-bottom:10px;"></div>
      <div class="content-2" style="margin-right:20px;">
        <div class="recent_rating">
             <div class="title">
                 <h2>Add New Hall</h2>
                 <a href="hall.php" class="btn">Back</a>
             </div>
             <div class="container_form">
               <form onsubmit="event.preventDefault();" action="transaction.php" method="post" id="form">
               <div id="error" style="background:red;color:white;width:100%;padding:10px;display:none;position:relative;">
               <p id="error_close" style="position:absolute;right:10px;color:white;width:20px;height:20px;border-radius: 50%;border:1px solid white;text-align:center;">x</p>
                <ul></ul>
               </div>
               <br>
                <br>
                <br>
                <br>
               <div class="row">
               
                 <div class="col">
                   <?php 
                   $id=$_GET['id'];
                   $users=mysqli_query($conn, "select * from hall where id='$id'");
                   while($user=mysqli_fetch_array($users)){
                       
                   
                   ?>
                   <input type="hidden"  id="id" value="<?php echo $id?>">
                   <div class="input-box">
                     <span>Name</span>
                     <input type="text" placeholder="Hall Name" name="name" id="name" value="<?php echo $user['Name']?>">
                   </div>
                   <div class="input-box">
                     <span>columns</span>
                     <input type="text" placeholder="Columns" name="col" id="col" value="<?php echo $user['columns']?>">
                   </div>
                   
                 </div>
                 <div class="col">
                 <div class="input-box">
                     <span>Seats</span>
                     <input type="text" placeholder="Seats" name="seat" id="seat" value="<?php echo $user['Seats']?>">
                   </div>
                  <?php }?>
                   
                 </div>
                 
                </div>
               
                <br>
                <br>
               
              
                <input type="submit" value="Save" class="submit-btn" name="save_hall">
                 </form>
               </div>
               
             </div>
        </div>
        
    </div>
    <script>
      //login form Validation fields
const form=document.querySelector("#form");
const errorDiv_val=document.querySelector("#error ul");
const errorDiv=document.querySelector("#error");
const name=document.querySelector("#name");
const seat=document.querySelector("#seat");
const id=document.querySelector("#id");
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
      form_data.append('name',name.value);	
    	form_data.append('seat',seat.value);	
      form_data.append('id',id.value);
      form_data.append('col',col.value);	
      form_data.append('update_hall',"new_hall");
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
                    window.location.href='Hall.php';
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