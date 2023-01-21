<?php include('components/body.php');?>
<div class="alert hide">
		 <div class="ex">
		 <span>!</span></div>
		 <span class="msg" id="global_msg">Record Deleted</span>
		 <span class="close_btn">
			 <span class="cl">x</span>
	    </span>
	 </div>
    <div class="content">
      
      <div style="width:100%; height:2px;background-color:black;margin-bottom:10px;"></div>
      <div style="width:95%; margin-left:2.3%; margin-bottom:10px; ">
      <h2>Dashboard/Setttings</h2>
    
     </div>
      <div style="width:95%; margin-left:2.3%; height:2px;background-color:rgb(134,144,153);margin-bottom:10px;"></div>
      <div class="content-2" style="margin-right:20px;">
        <div class="recent_rating">
             <div class="title">
                 <h2>Settings</h2>
                 <a href="new_settings.php" class="btn">Add New</a>
             </div>
             <table style="width:100%;table-layout:fixed;">
                 <tr>
                     <th>Number</th>
                     <th>Name</th>
                     <th>value</th>
                     <th>operation</th>
                 </tr>
                 <?php
                    $count =1;
                    $users=mysqli_query($conn, "select * from settings");
                    while($user=mysqli_fetch_array($users)){
                        
                    ?>
                 <tr >
                     <td style="width:10px;"><?php echo $count;?></td>
                     <td><?php echo $user['Name'];?></td>
                     <td style="word-wrap:break-word;"><?php echo $user['value'];?></td>
                     <td style="display:flex;"><a href="viewsettings.php?id=<?php echo $user['id'];?>" ><img src="icons/view.png" alt="" class="operation"></a><a href="edit_settings.php?id=<?php echo $user['id'];?>" ><img src="icons/edit.png" alt="" class="operation"></a><form action="transaction.php" method="post" onsubmit="event.preventDefault();" id="form" style="width:30px;"><button style="background:none; border:none;outline:none;width:20px; " name="delete_settings" type="submit" ><input type="hidden" name="id" id="de_id" value="<?php echo $user['id'];?>"><input type="hidden" name="" id="delete_set" value="<?php echo $user['id'];?>"><img src="icons/trash.png" alt="" class="operation"></button></form></td>
                 </tr>
                 <?php $count++;}?>
                 
             </table>
        </div>
        
    </div>
    <script>
      //login form Validation fields
const form=document.querySelector("#form");
const id=document.querySelector("#de_id");
const save_user=document.querySelector("#delete_set");
const msg=document.querySelector("#global_msg");


//login validation
form.addEventListener("submit", (error)=>{
   
    console.log("here");
    var form_element = error;  	
    var form_data = new FormData();
      form_data.append('id',id.value);
      form_data.append('delete_settings',save_user.value);	
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
                    console.log(response.id)
                    window.location.href="settings.php";
                    
                    } 
                    else { 		
                      var msg="";		
                       		
                      var p=response;
                      for(var key in p){
                        if(p[key]!=""){}
                        msg+=p[key];
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