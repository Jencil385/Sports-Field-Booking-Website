function deleteuser(usermail){
	var eid=usermail;
           var information=[eid];
             if(confirm("Are you sure to delete booking?")){
            jQuery.ajax({
                                type: "POST",
                                url: 'controller/manageUsers.php',
                                dataType: 'json',
                                data: {functionname: 'deleteusers', arguments: [information]},

                                success: function (data, textstatus) 
                                {
                                              if(('error' in data) ) 
                                              {
                                                  setTimeout(function(){ window.location.reload(); },3000);
                                                  return false;
                                               }
                                              else 
                                                 {
                                                 // window.location.reload();
                                                 setTimeout(function(){ window.location.reload(); },3000);
                                                   return true;
                                                   }

                                              
                                }
                              });
          }
}