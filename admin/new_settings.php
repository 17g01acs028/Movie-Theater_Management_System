<?php include('components/body.php');?>
<div class="alert hide">
		 <div class="ex">
		 <span>!</span></div>
		 <span class="msg" id="global_msg">New setting recorded</span>
		 <span class="close_btn">
			 <span class="cl">x</span>
	    </span>
	 </div>
    <div class="content">
    
      <div style="width:100%; height:2px;background-color:black;margin-bottom:10px;"></div>
      <div style="width:95%; margin-left:2.3%; margin-bottom:10px; ">
      <h2>Dashboard/New Settings</h2>
    
     </div>
      <div style="width:95%; margin-left:2.3%; height:2px;background-color:rgb(134,144,153);margin-bottom:10px;"></div>
      <div class="content-2" style="margin-right:20px;">
        <div class="recent_rating">
             <div class="title">
                 <h2>Add New settings</h2>
                 <a href="settings.php" class="btn">Back</a>
             </div>
             <div class="container_form">
               <form onsubmit="event.preventDefault();" action="transaction.php" method="post" id="form">
               <div id="error" style="background:red;color:white;width:100%;padding:10px;display:none;position:relative;">
               <p id="error_close" style="position:absolute;right:10px;color:white;width:20px;height:20px;border-radius: 50%;border:1px solid white;text-align:center;">x</p>
                <ul></ul>
               </div>
               <div class="row">
               
                 <div class="col">
                   
                   <div class="input-box">
                     <span>Name</span>
                     <input type="text" placeholder="Name" name="name" id="name">
                   </div>
                   
                   
                   
                 </div>
                 <div class="col">
                 <div class="input-box">
                     <span>Value</span>
                     <input type="text" placeholder="value" name="value" id="value">
                   </div>
                 
                  
                   
                 </div>
                 
                </div>
               
                <input type="hidden" id="save_settings" value="save_settings">
                <input type="submit" value="Save" class="submit-btn" name="save_settings" style="margin-top:100px;">
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

const error_close=document.querySelector("#error_close");
const save_user=document.querySelector("#save_settings");
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
      
      form_data.append('save_settings',save_user.value);	
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
   