function logout(){
	var ha="loing";
	jQuery.ajax({
                                type: "POST",
                                url: 'controller/userregister.php',
                                dataType: 'json',
                                data: {functionname: 'logout' , arguments: [ha]},

                                success: function (data, textstatus) 
                                {
                                              if(('error' in data) ) 
                                              {
                                              	alert("Unable to logout");
                                                  window.location.href = 'index.php'; 
                                               }
                                              else 
                                                 {
                                                   yourVariable = data["success"];
                                                    window.location.href = 'index.php';
                                                                                          	
                                                   }

                                              
                                }
                              });
}