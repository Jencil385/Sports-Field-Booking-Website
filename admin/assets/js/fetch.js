var username="";
function filteruser(user){
	
	jQuery.ajax({
                                type: "POST",
                                url: 'controller/fetchuser.php',
                                dataType: 'json',
                                data: {functionname: 'fetchuser', arguments: [user]},

                                success: function (data, textstatus) 
                                {
                                              if(('error' in data)) 
                                               {
                                                 window.location.href = './index.php';
                                               }
                                              else 
                                                 {

                                                   username = data["success"];
                                                     
                                                   var managebooking='<li class="nav-item"><a class="nav-link" href="mbooking.php">'+
                                                   '<div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text">'+
                                                   ' Manage Bookings</span>'+
                                                   ' </div>'+
                                                   ' </a></li>';

                                                   var manageevent='<li class="nav-item"><a class="nav-link" href="mevent.php">'+
                                                   '<div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-calendar-week"></span></span><span class="nav-link-text">'+
                                                   ' Manage Event</span>'+
                                                   ' </div>'+
                                                   ' </a></li>';


                                                    var eventsusrs='<li class="nav-item"><a class="nav-link" href="eventsusers.php">'+
                                                   '<div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-users"></span></span><span class="nav-link-text">'+
                                                   ' Events Users</span>'+
                                                   ' </div>'+
                                                   ' </a></li>';



                                                   var mfeedback='<li class="nav-item"><a class="nav-link" href="mfeedback.php">'+
                                                   '<div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-comment-dots"></span></span><span class="nav-link-text">'+
                                                   ' Feedbacks</span>'+
                                                   ' </div>'+
                                                   ' </a></li>';

                                                   var mfeedbackglob='<li class="nav-item"><a class="nav-link" href="mfeedbackglob.php">'+
                                                   '<div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-comment-dots"></span></span><span class="nav-link-text">'+
                                                   ' Global Feedbacks</span>'+
                                                   ' </div>'+
                                                   ' </a></li>';

                                                   var musers='<li class="nav-item"><a class="nav-link" href="muser.php">'+
                                                   '<div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-users"></span></span><span class="nav-link-text">'+
                                                   ' Manage Users</span>'+
                                                   ' </div>'+
                                                   ' </a></li>';

                                                    var profile='  <li class="nav-item"><a class="nav-link" href="profile.php">'+
                                                   '<div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user-plus"></span></span><span class="nav-link-text">Profile</span>'+
                                                   '</div>'+
                                                   '</a></li>';
                                                 
                                                   
                                                  
                                                   //conditions starts here
                                                   if(username===2)
                                                   {
                                                     document.getElementById("manual").innerHTML=managebooking+manageevent+eventsusrs+mfeedback+mfeedbackglob+musers+profile;
                                                   }
                                                  
                                                           	
                                                   }

                                              
                                }
                              });
	 return username; 
}