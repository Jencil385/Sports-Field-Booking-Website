

function registerevent(){
   $(".validate-title").hide();
        $(".validate-desc").hide();
        $(".validate-bookdate").hide();
        $(".validate-booktime").hide();
        $(".validate-bookevent").hide();
       var email=document.getElementById("email2id").value;
       var eventTitle=document.getElementById("inputEvents").value;
       var eventDesc = document.getElementById("inputdesc").value;
       var eventDate=document.getElementById("date").value;
       var time=document.getElementById("inputTime").value;
       var eventName=document.getElementById("inputEvents").value;

        var error=false;
      if(eventTitle==""){
      $(".validate-title").html("Please fill this field").show();
      error=true;
      }if(eventDesc==""){
        $(".validate-desc").html("Please fill this field").show();
         error=true;
      }if(eventDate==""){
        $(".validate-bookdate").html("Please fill this field").show();
         error=true;
      }if(time==""){
        $(".validate-booktime").html("Please fill this field").show();
         error=true;
      }if(eventName==""){
        $(".validate-bookevent").html("Please fill this field").show();
         error=true;
      }
    
         if(!error){
          var datetimes=eventDate+" "+time+":00";
            var information=[email,eventTitle,eventDesc,datetimes,eventName];
            jQuery.ajax({
                                type: "POST",
                                url: 'controller/addevents.php',
                                dataType: 'json',
                                data: {functionname: 'addevents', arguments: [information]},

                                success: function (data, textstatus) 
                                {
                                              if(('error' in data) ) 
                                              {
                                                 $(".validate-fail").html("Unable to Add").show();
                                                    setTimeout(function(){ window.location.reload(); },3000);
                                               }
                                              else 
                                                 {
                                                   
                                                   $(".validate-success").html("Added Successfully").show();
                                                   setTimeout(function(){ window.location.reload(); },3000);
                                                   }

                                              
                                }
                              });
          
        }
}


function deleteEvents(eventID){
var eid=eventID;
           var email=document.getElementById("email2id").value;
           var information=[email,eid];
             if(confirm("Are you sure to delete booking?")){
            jQuery.ajax({
                                type: "POST",
                                url: 'controller/addevents.php',
                                dataType: 'json',
                                data: {functionname: 'deleteevents', arguments: [information]},

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



function deleteglobfeedback(globID){
  var email=document.getElementById("email2id").value;
           var information=[email,globID];
             if(confirm("Are you sure to delete booking?")){
            jQuery.ajax({
                                type: "POST",
                                url: 'controller/addevents.php',
                                dataType: 'json',
                                data: {functionname: 'deletglodeevents', arguments: [information]},

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


function deletefeedback(feedID){
  var email=document.getElementById("email2id").value;
           var information=[email,feedID];
             if(confirm("Are you sure to delete booking?")){
            jQuery.ajax({
                                type: "POST",
                                url: 'controller/addevents.php',
                                dataType: 'json',
                                data: {functionname: 'deletefeedbacks', arguments: [information]},

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