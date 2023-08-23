function updateprofile(){
      
       var fname= document.getElementById("first-name").value;
       var lname= document.getElementById("last-name").value;
       var email=document.getElementById("email2id").value;
       var uphone= document.getElementById("phone").value;
  
        
        if(fname=="" || lname=="" || uphone==""){
          alert("Please enter Mandatory field");
        }else if(uphone.length<10 || uphone.length>10){
           alert("Please enter valid mobile");
        }
        else{
          if(confirm("Are you sure to change details?")){
            var information=[fname,lname,uphone,email];
            jQuery.ajax({
                                type: "POST",
                                url: 'controller/updateprofile.php',
                                dataType: 'json',
                                data: {functionname: 'updateprofile', arguments: [information]},

                                success: function (data, textstatus) 
                                {
                                              if(('error' in data) ) 
                                              {
                                                 yourVariable = data["error"];
                                                return true;
                                                 
                                               }
                                              else 
                                                 {
                                                   yourVariable = data["success"];
                                                   return true;
                                                   }

                                              
                                }
                              });
          }else{
            return false;
          }
        }
}


function updatepassword(){
      
       var oldpass= document.getElementById("old-password").value;
       var newpass= document.getElementById("new-password").value;
       var email=document.getElementById("email2id").value;
       var conpass= document.getElementById("confirm-password").value;
  
        
        if(oldpass=="" || newpass=="" || conpass==""){
          $(".validate-pass").html("Enter all mandatory fields").show();
        }else if(newpass != conpass){
            $(".validate-pass").html("Password dosen't Match").show();
        }
        else{
            var information=[oldpass,newpass,conpass,email];
            jQuery.ajax({
                                type: "POST",
                                url: 'controller/updateprofile.php',
                                dataType: 'json',
                                data: {functionname: 'changepass', arguments: [information]},

                                success: function (data, textstatus) 
                                {
                                              if(('error' in data) ) 
                                              {
                                                 yourVariable = data["error"];
                                                  $(".validate-pass").html("Old Password dosen't match").show();
                                                  setTimeout(function(){ $("#updatepass").load(location.href + " #updatepass"); },3000);
                                                  
                                                 
                                               }
                                              else 
                                                 {
                                                   yourVariable = data["success"];
                                                    $(".validate-success").html("Updated successfully").show();
                                                    setTimeout(function(){ $("#updatepass").load(location.href + " #updatepass"); },3000);
                                                   
                                                   }

                                              
                                }
                              });
          
        }
}


function decativate(){
      
      
       var email=document.getElementById("email2id").value;

  
        
        if(confirm("Are you sure to Deactivate your account?")){
         
            var information=[email];
            jQuery.ajax({
                                type: "POST",
                                url: 'controller/updateprofile.php',
                                dataType: 'json',
                                data: {functionname: 'deactivate', arguments: [information]},

                                success: function (data, textstatus) 
                                {
                                              if(('error' in data) ) 
                                              {
                                                   window.location.reload();
                                                  
                                                 
                                               }
                                              else 
                                                 {
                                                   window.location.reload();
                                                   }

                                              
                                }
                              });
          
        }
}


function intBooking(){
      
       $(".validate-bookname").hide();
       $(".validate-bookevent").hide();
        $(".validate-bookdate").hide();
        $(".validate-booktime").hide();
        $(".validate-bookminuts").hide();
       var email=document.getElementById("email2id").value;
       var event=document.getElementById("inputTopic").value;
       var eventtype = document.getElementById("inputProblem").value;
       var date=document.getElementById("date").value;
       var time=document.getElementById("inputTime").value;
       var datetime=date+" "+time+":00";
       var duhr=document.getElementById("num_hours").value;
       var dumin=document.getElementById("num_minutes").value;

        var error=false;
      if(event==""){
      $(".validate-bookname").html("Please fill this field").show();
      error=true;
      }if(eventtype==""){
        $(".validate-bookevent").html("Please fill this field").show();
         error=true;
      }if(date==""){
        $(".validate-bookdate").html("Please fill this field").show();
         error=true;
      }if(time==""){
        $(".validate-booktime").html("Please fill this field").show();
         error=true;
      }if(duhr=="" || (duhr=="00 hrs" && dumin=="00 mins") || dumin=="" || duhr=="Hours" || dumin=="Minutes"){
        $(".validate-bookminuts").html("Please fill duration").show();
         error=true;
      }
    
         if(!error){
            var information=[email,event,eventtype,datetime,duhr,dumin];
            jQuery.ajax({
                                type: "POST",
                                url: 'controller/updateprofile.php',
                                dataType: 'json',
                                data: {functionname: 'addbookings', arguments: [information]},

                                success: function (data, textstatus) 
                                {
                                              if(('error' in data) ) 
                                              {
                                                   window.location.reload();
                                                  
                                                 
                                               }
                                              else 
                                                 {
                                                   window.location.reload();
                                                   }

                                              
                                }
                              });
          
        }
}


function deleteBooking(bookingID){

           var bid=bookingID;
           var email=document.getElementById("email2id").value;
           var information=[email,bid];
             if(confirm("Are you sure to delete booking?")){
            jQuery.ajax({
                                type: "POST",
                                url: 'controller/updateprofile.php',
                                dataType: 'json',
                                data: {functionname: 'deletebookings', arguments: [information]},

                                success: function (data, textstatus) 
                                {
                                              if(('error' in data) ) 
                                              {
                                                 window.location.reload();
                                                  return false;
                                               }
                                              else 
                                                 {
                                                  window.location.reload();
                                                   return true;
                                                   }

                                              
                                }
                              });
          }
          
        
}