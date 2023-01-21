<?php include('components/body.php');?>
<div class="alert hide">
		 <div class="ex">
		 <span>!</span></div>
		 <span class="msg" id="global_msg">User Record Updated</span>
		 <span class="close_btn">
			 <span class="cl">x</span>
	    </span>
	 </div>
    <div class="content">
    
      <div style="width:100%; height:2px;background-color:black;margin-bottom:10px;"></div>
      <div style="width:95%; margin-left:2.3%; margin-bottom:10px; ">
      <h2>Dashboard/Add User</h2>
    
     </div>
      <div style="width:95%; margin-left:2.3%; height:2px;background-color:rgb(134,144,153);margin-bottom:10px;"></div>
      <div class="content-2" style="margin-right:20px;">
        <div class="recent_rating">
             <div class="title">
                 <h2>Add New User</h2>
                 <a href="users.php" class="btn">Back</a>
             </div>
             <div class="container_form">
               <form onsubmit="event.preventDefault();" action="transaction.php" method="post" id="form">
               <div id="error" style="background:red;color:white;width:100%;padding:10px;display:none;position:relative;">
               <p id="error_close" style="position:absolute;right:10px;color:white;width:20px;height:20px;border-radius: 50%;border:1px solid white;text-align:center;">x</p>
                <ul></ul>
               </div>
               <input type="hidden" name="id" id ="e_id" value="<?php echo $_GET['id'];?>">
               
               <div class="row">
               
                 <div class="col">
                 <?php
                    $count =1;
                    $id=$_GET['id'];
                    $users=mysqli_query($conn, "select * from users where id='$id'");
                    while($user=mysqli_fetch_array($users)){
                        
                    ?>
                   <div class="input-box">
                     <span>Full Name</span>
                     <input type="text" placeholder="User Name" name="name" id="name" value="<?php echo $user['username'];?>">
                   </div>
                   <div class="input-box">
                     <span>Email</span>
                     <input type="text" placeholder="Example@gmail.com" name="email" id="email" value="<?php echo $user['email'];?>">
                   </div>
                   <div class="input-box">
                     <span>phone</span>
                     <input type="text" placeholder="07xxxxxxx or 01xxxxxxxx" name="phone" id="phone" value="<?php echo $user['phone'];?>">
                   </div>
                   
                 </div>
                 <div class="col">
                 <div class="input-box">
                     <span>Address</span>
                     <textarea name="address" id="address" cols="30" rows="10" ><?php echo $user['address'];?></textarea>
                   </div>
                  <?php }?>
                   
                 </div>
                 
                </div>
               
                <input type="hidden" id="save_user" id="e_user" value="edit_user">
                <input type="submit" value="Save" class="submit-btn" name="edit_user">
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
const username=document.querySelector("#name");
const email=document.querySelector("#email");
const phone=document.querySelector("#phone");
const id=document.querySelector("#e_id");
const address=document.querySelector("#address");
const error_close=document.querySelector("#error_close");
const e_user=document.querySelector("#e_user");
const msg=document.querySelector("#global_msg");
error_close.addEventListener("click", ()=>{
  errorDiv.style.display= `none`;
      });

//login validation
form.addEventListener("submit", (error)=>{
   
    console.log("here");
    var form_element = error;  	
    var form_data = new FormData();
    form_data.append('id',id.value);	
      form_data.append('name',username.value);	
    	form_data.append('email',email.value);	
      form_data.append('phone',phone.value);	
      form_data.append('address',address.value);
      form_data.append('edit_user',"e_user");	
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
                    
                    window.location.href="users.php";
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
   