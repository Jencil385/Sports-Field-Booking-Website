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
                                                     
                                                   var dashboard_alt='<li class="nav-item"><a class="nav-link" href="dashboard-alt.php">'+
                                                   '<div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user-plus"></span></span><span class="nav-link-text">Dashboard-alt'+
                                                          '</span>'+
                                                   '</div>'+
                                                   '</a></li>';
                                                   var dashboard='<li class="nav-item"><a class="nav-link" href="users.php">'+
                                                   '<div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text">'+
                                                   ' Bookings</span>'+
                                                   ' </div>'+
                                                   ' </a></li>';
                                                   var profile='  <li class="nav-item"><a class="nav-link" href="profile.php">'+
                                                   '<div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user-plus"></span></span><span class="nav-link-text">Profile</span>'+
                                                   '</div>'+
                                                   '</a></li>';
                                                  
                                                  
                                                  
                                                 
                                                   var support='  <li class="nav-item"><a class="nav-link" target="_blank" data-toggle="modal"'+
                                                   ' data-target="#support" style="cursor:pointer;">'+
                                                   '<div class="d-flex align-items-center"><span class="nav-link-icon"><span'+
                                                   '           class="fas fa-headset"></span></span><span'+
                                                   '        class="nav-link-text">Support</span>'+
                                                   ' </div>'+
                                                   ' </a></li>';
                                                 
               
                                                   var feedback='<li class="nav-item"><a class="nav-link" target="_blank" data-toggle="modal"'+
                                                   ' data-target="#feedback" style="cursor:pointer;">'+
                                                   '  <div class="d-flex align-items-center"><span class="nav-link-icon"><span'+
                                                   '          class="fas fa-comment-dots"></span></span><span class="nav-link-text">'+
                                                   '      Feedback</span>'+
                                                   '  </div>'+
                                                   '  </a></li>';
                                                 
                                                   
                                                  
                                                   //conditions starts here
                                                   if(username==2)
                                                   {
                                                     document.getElementById("manual").innerHTML=dashboard_alt+dashboard+profile+hwebinar+support+feedback;
                                                   }
                                                   else if(username==1)
                                                   {
                                                      document.getElementById("manual").innerHTML=dashboard+profile+support+feedback;  
                                                   }
                                                           	
                                                   }

                                              
                                }
                              });
	 return username; 
}