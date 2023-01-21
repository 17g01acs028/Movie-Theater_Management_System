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
      <h2>Dashboard/Edit Settings</h2>
    
     </div>
      <div style="width:95%; margin-left:2.3%; height:2px;background-color:rgb(134,144,153);margin-bottom:10px;"></div>
      <div class="content-2" style="margin-right:20px;">
        <div class="recent_rating">
             <div class="title">
                 <h2>Edit settings</h2>
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
                     <input type="text" placeholder="Name" name="name" id="name" value="<?php echo $user['Name']?>">
                   </div>
                   
                   
                   
                 </div>
                 <div class="col">
                 <div class="input-box">
                     <span>Value</span>
                     <input type="text" placeholder="value" name="value" id="value" value="<?php echo $user['value']?>">
                   </div>
                 
                  <?php }?>
                   
                 </div>
                 
                </div>
               
                <input type="hidden" id="update_settings" value="update_settings">
                <input type="submit" value="Save" class="submit-btn" name="update_settings" style="margin-top:100px;">
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
const value=document.querySelector("#value");
const id=document.querySelector("#up_id");
const error_close=document.querySelector("#error_close");
const save_user=document.querySelector("#update_settings");
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
    	form_data.append('value',value.value);	
      form_data.append('id',id.value);
      form_data.append('update_settings',save_user.value);	
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
                    window.location.href="settings.php";
                    
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
   