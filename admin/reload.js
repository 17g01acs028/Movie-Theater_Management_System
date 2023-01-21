

      
// Reload Function      
function save_data(data) { 
    
    // var form_element = document.getElementsByClassName('form_data');  	
      var form_data = new FormData();
      form_data.append('age','20');	
    // for(var count = 0; count < form_element.length; count++) 	{ 		
    //     form_data.append(form_element[count].name, form_element[count].value); 	
    //     }  	
       // document.getElementById('submit').disabled = true;  	
        var ajax_request = new XMLHttpRequest();  	
        ajax_request.open('POST', 'data.php?'+data);  	
        ajax_request.send(form_data);  	
        ajax_request.onreadystatechange = function() 	
        
        {
            
            
            if(ajax_request.readyState == 4 && ajax_request.status == 200) 		
            { 
               		
                //document.getElementById('submit').disabled = false;  			
                var response = ajax_request.responseText;  
                	
                
                if(response.success != '') 			{ 				
                    var target = document.getElementById("value");
                    target.innerHTML=response;	
                    	
                    } 
                    else { 				
                       alert('page not reloaded');			
                        }  			 		
            } 	
    } 
} 