function submitsup(){
$(".validate-supportprb").hide();
$(".validate-supportmess").hide();
var selected=document.getElementById("inputSupportValue").value;
var message=document.getElementById("inputMessage").value;
var error=true;
if(selected=="") {
$(".validate-supportprb").html("Please fill this field").show();
error=false;
}if(message==""){
  $(".validate-supportmess").html("Please fill this field").show();
  error=false;
}
if(error){

jQuery.ajax({
    type: "POST",
    url: 'controller/submitform.php',
    dataType: 'json',
    data: {functionname: 'submitsupport', arguments: [selected,message]},

    success: function (data, textstatus) 
    {
                  if(('error' in data) ) 
                  {
                      yourVariable = data["error"];
                      if(yourVariable=="not present"){
                        $(".validate-supportsuccess").html("Something happend! Contact admin").show();
                       window.location.reload();
                       
                      }else if(yourVariable=="insert failed"){
                         $(".validate-supportsuccess").html("Support not submitted").show();
                         window.location.reload();
                          
                      }
                      

                  }
           else 
                   {
                     $(".validate-supportsuccess").html("Thanks for your comments ! Will get back to you soon").show();
                      window.location.reload();   
                                           
                  }

                  
    }
  });

}
}

function submitfeed(){

  var star1=document.getElementById("star-1").checked;
  var star2=document.getElementById("star-2").checked;
  var star3=document.getElementById("star-3").checked;
  var star4=document.getElementById("star-4").checked;
  var star5=document.getElementById("star-5").checked;

  var prob=document.getElementById("feed_problem").value;

  var poor=document.getElementById("poor").checked;
  var good=document.getElementById("good").checked;
  var best=document.getElementById("best").checked;

  var sugg=document.getElementById("feed_suggestion").value;
  var flag=0;
  
  var exp="notfill";
  if(star1){
   flag=1;
  }else if(star2){
    flag=2;
  }
  else if(star3){
    flag=3;
  }
  else if(star4){
    flag=4;
  }
  else if(star5){
    flag=5;
  }
  
  if(poor){
   exp="poor";
  }else if(good){
    exp="good";
  }else if(best){
    exp="best";
  }
 
 if(flag==0 || exp=="notfill" || prob=="" || sugg==""){
  alert("Please fill All details");
  document.getElementById("star-1").checked=false;
  document.getElementById("star-2").checked=false;
  document.getElementById("star-3").checked=false;
  document.getElementById("star-4").checked=false;
  document.getElementById("star-5").checked=false;
  document.getElementById("poor").checked=false;
  document.getElementById("good").checked=false;
  document.getElementById("best").checked==false;
  document.getElementById("feed_suggestion").value="";
  document.getElementById("feed_problem").value="";
 }else{

jQuery.ajax({
    type: "POST",
    url: 'controller/submitform.php',
    dataType: 'json',
    data: {functionname: 'submitfeed', arguments: [flag,prob,exp,sugg]},

    success: function (data, textstatus) 
    {
                  if(('error' in data) ) 
                  {
                      yourVariable = data["error"];
                      if(yourVariable=="not present"){
                        alert("Something happend! Contact admin");
                        window.location.reload();  
                      }else if(yourVariable=="insert failed")
                      {
                         
                        alert("Support not submitted");
                         window.location.reload();  
                      }else if(yourVariable=="not present"){
                        alert("User ID not present");
                         window.location.reload();  
                      }
                      

                  }
           else 
                   {
                       alert("Woow notted your comments");      
                     window.location.reload();  
                                           
                  }

                  
    }
  });

 }

}