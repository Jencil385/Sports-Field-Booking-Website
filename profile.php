<?php 
session_start();if(!isset($_SESSION['emailid'])){
    header("location:index.php");
}
else{
    $role=$_SESSION['role'];
    if($role===1||$role===2)
    {
        
    ?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Cross Fit | Account Profile</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/logo.jpg">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/logo.jpg">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/logo.jpg">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.jpg">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <script src="assets/js/config.navbar-vertical.js"></script>
    <script src="assets/js/fetch.js"></script>
     <script src="assets/js/loadprofile.js"></script>
     <script src="assets/js/pupdateuser.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="assets/lib/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet">
    <link href="assets/lib/fancybox/jquery.fancybox.min.css" rel="stylesheet">
    <link href="assets/lib/flatpickr/flatpickr.min.css" rel="stylesheet">
    <script>
        if (window.localStorage.getItem("site-theme") == "dark")
            document.write('<link href="assets/css/theme-dark.css" rel="stylesheet"  id="light">');
        else
            document.write('<link href="assets/css/theme.css" rel="stylesheet"  id="light">');

    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>


<body>
<script type="text/javascript">
  window.onload = function() {
  var usernamevalue=filteruser('<?php echo $_SESSION['emailid'];?>');
  document.getElementById("email1id").disabled=true;
                             };
                              $(function () {
                                                var dtToday = new Date();

                                                var month = dtToday.getMonth() + 1;
                                                var day = dtToday.getDate();
                                                var year = dtToday.getFullYear();
                                                if (month < 10)
                                                    month = '0' + month.toString();
                                                if (day < 10)
                                                    day = '0' + day.toString();

                                                var maxDate = year + '-' + month + '-' + day;
                                                $('#date').attr('min', maxDate);
                                            });
</script>

<script>
                    $(document).ready(function () {

                    var hour = document.getElementById("num_hours");
                    for (i = 0; i <= 23; i++) {
                        var opt = document.createElement('option');
                        if (i.toString().length == 1) {
                            opt.innerHTML = "0".concat(i.toString(), " hrs");
                            opt.value = "0".concat(i.toString(), " hrs");
                        } else {
                            opt.innerHTML = i.toString().concat(" hrs");
                            opt.value = i.toString().concat(" hrs");
                        }
                        hour.appendChild(opt);
                    }

                    var minute = document.getElementById("num_minutes");
                    for (i = 0; i <= 59; i++) {
                        var opt = document.createElement('option');
                        if (i.toString().length == 1) {
                            opt.value = "0".concat(i.toString(), " mins");
                            opt.innerHTML = "0".concat(i.toString(), " mins");
                        } else {
                            opt.value = i.toString().concat(" mins");
                            opt.innerHTML = i.toString().concat(" mins");
                        }

                        minute.appendChild(opt);
                    }

                     });
                </script>

                
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">


        <div class="container-fluid" data-layout="container">
            <nav class="navbar navbar-vertical navbar-expand-xl navbar-vibrant">
                <div class="d-flex align-items-center">
                    <div class="toggle-icon-wrapper">

                        <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-toggle="tooltip" data-placement="left"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

                    </div><a class="navbar-brand" href="users.php">
                        <div class="d-flex align-items-center py-3"><span
                                class="text-sans-serif" style="font-size:1rem; color:#009da0;">CROSS <span
                                    style="color:#FF9933;">FIT </span><span
                                    style="color: #138808">ARENA</span></span>
                        </div>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
                    <div class="navbar-vertical-content perfect-scrollbar scrollbar">
                        <ul class="navbar-nav flex-column">
                            <p id="manual"></p>
                        </ul>
                </div>
            </nav>

            <div class="content">
                <nav class="navbar navbar-light navbar-glass navbar-top sticky-kit navbar-expand">

                    <button class="btn navbar-toggler-humburger-icon navbar-toggler mr-1 mr-sm-3" type="button" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
                    <a class="navbar-brand mr-1 mr-sm-3" href="index.html">
                        <div class="d-flex align-items-center py-3"><span
                                class="text-sans-serif" style="font-size:1rem; color:#009da0;">CROSS <span
                                    style="color:#FF9933;">FIT </span><span
                                    style="color: #138808">ARENA</span></span>
                        </div>
                    </a>

                    <ul class="navbar-nav navbar-nav-icons ml-auto flex-row align-items-center">
                       
                        <li class="nav-item dropdown dropdown-on-hover"><a class="nav-link pr-0" id="navbarDropdownUser"
                                href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <div class="avatar avatar-xl">
                                    <img class="rounded-circle" src="assets/img/team/3-thumb.png" alt="" />

                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="navbarDropdownUser">
                                <div class="bg-white rounded-soft py-2">

                                    <div class="dropdown-divider"></div>
                                    


                                    <div class="d-flex justify-content-between">
                                        <div class="dropdown-item">Dark Mode</div>
                                        <div class="custom-control custom-switch">
                                            <input class="custom-control-input" id="dark-mode"
                                                style="z-index: 2; cursor:pointer" type="checkbox" />
                                            <label class="custom-control-label" style="z-index: 2; cursor:pointer"
                                                for="dark-mode"> </label>
                                        </div>
                                    </div>


                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" id="hdjnndkndn" style="cursor:pointer" onclick="return logout();">Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
                <script>
                    $(document).ready(function() {

                        $('#dark-mode').change(function() {
                            if (this.checked) {
                                goDark("dark");
                            } else {
                                goDark("light");
                            }
                        });
                    });

                </script>


                <!-- Modal -->
                <div class="modal fade" id="support" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center ml-4 mr-auto w-100" id="exampleModalLabel">Support Form</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group"><label class="text-dark" for="inputProblem">Problems
                                        with</label>
                                <select class="form-control" style="height:3.125rem" id="inputSupportValue" name="inputBookValue">
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Cricket">Cricket</option>
                                        <option value="Football">Football</option>
                                        <option value="PS5">PS5</option>
                                        <option value="Batminton">Batminton</option>
                                    </select>
                                </div>
                                <div class="validate-supportprb" style="color:red;"></div>
                                <div class="form-group"><label class="text-dark"
                                        for="inputMessage">Message</label><textarea class="form-control py-3"
                                        id="inputMessage" name="inputMessage" type="text"
                                        placeholder="Enter your message..." rows="4"></textarea></div>

                            <div class="validate-supportmess" style="color:red;"></div>  
                            </div>
                            <div class="validate-supportsuccess" style="color:green;"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success mx-auto"
                                    id="support_submit" onclick="submitsup();">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="feedback" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center ml-4 mr-auto w-100" id="exampleModalLabel">Feedback
                                    Form</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <label class="text-dark" for="quality">Rate our Game Experience</label>
                                <div class="form-group stars text-center">
                            <input class="star star-5" id="star-5" type="radio" name="star" />
                            <label class="star star-5" for="star-5"></label>
                            <input class="star star-4" id="star-4" type="radio" name="star" />
                            <label class="star star-4" for="star-4"></label>
                            <input class="star star-3" id="star-3" type="radio" name="star" />
                            <label class="star star-3" for="star-3"></label>
                            <input class="star star-2" id="star-2" type="radio" name="star" />
                            <label class="star star-2" for="star-2"></label>
                            <input class="star star-1" id="star-1" type="radio" name="star" />
                            <label class="star star-1" for="star-1"></label>

                        </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12"><label class="text-dark" for="feed_problem">Any
                                            Specific Problems you faced? If yes Kindly Explain.</label><input
                                            class="form-control py-4" id="feed_problem" name="feed_problem" type="text"
                                            placeholder="Your answer" /></div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12"><label class="text-dark" for="feed_problem">How was your overall experience? </label>
                                <div class="form-row justify-content-center">
                                    <div class="mx-3 mx-sm-4"><input class="mr-1" style="margin-top:0.3rem" type="radio" name="feed_exp" id="poor" /><label class="text-dark">Poor</label></div>
                                    <div class="mx-3 mx-sm-4"><input class="mr-1" style="margin-top:0.3rem" type="radio" name="feed_exp" id="good" /><label class="text-dark">Good</label></div>
                                    <div class="mx-3 mx-sm-4"><input class="mr-1" style="margin-top:0.3rem" type="radio" name="feed_exp" id="best" /><label class="text-dark">Best</label></div>
                                </div>
                            </div>
                                </div>

                                <div class="form-row">
                            <div class="form-group col-md-12"><label class="text-dark" for="feed_suggestion">Any Suggestions</label><input class="form-control py-4" id="feed_suggestion" name="feed_suggestion" type="text" placeholder="Your answer" /></div>
                        </div>



                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-success mx-auto"
                                    id="support_submit" onclick="submitfeed();">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

<?php 
require_once("database/database.php");

 $con=new DbConnector();
               $sql = "SELECT * FROM uregistration WHERE uemail=?";
               $stmt = $con->prepare($sql); 
               $stmt->bind_param("s", $_SESSION['emailid']);
               $stmt->execute();
               $dbfname="";
               $dblname="";
               $dbphone="";
               $result = $stmt->get_result();
               if($result){
                while($row = $result->fetch_assoc()) {
                  $dbfname=$row['ufname'];
                  $dblname=$row['ulname'];
                  $dbphone=$row['umob'];
              }}
?>
               
                <div class="row no-gutters">
                    <div class="col-lg-8 pr-lg-2">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="mb-0">Profile Settings</h5>
                            </div>
                            <div class="card-body bg-light">
                                <form>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="first-name">First Name</label>
                                                <input class="form-control" id="first-name" type="text" value="<?php echo $dbfname; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="last-name">Last Name</label>
                                                <input class="form-control" id="last-name" type="text" value="<?php echo $dblname; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="email1">Email</label>
                                                <input class="form-control" id="email1id" type="text" value="<?php echo $_SESSION['emailid'];?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input class="form-control" id="phone" type="text" value="<?php echo $dbphone; ?>">
                                            </div>
                                        </div>
                                        <input class="form-control" id="email2id" type="hidden" value="<?php echo $_SESSION['emailid'];?>">
                                        <script type="text/javascript">
                                                $(function() {
                                                    var dtToday = new Date();

                                                    var month = dtToday.getMonth() + 1;
                                                    var day = dtToday.getDate();
                                                    var year = dtToday.getFullYear();
                                                    if (month < 10)
                                                        month = '0' + month.toString();
                                                    if (day < 10)
                                                        day = '0' + day.toString();

                                                    var maxDate = year + '-' + month + '-' + day;
                                                    $('#birthday').attr('max', maxDate);
                                                });

                                            </script>
                                        
                                        
                                        <div class="col-12 d-flex justify-content-end">
                                            <button class="btn btn-primary" type="submit" onclick="return updateprofile()">Update </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                       
                    </div>
                    <div class="col-lg-4 pl-lg-2">
                        <div class="sticky-top sticky-sidebar">
                            <div class="card mb-3" id="updatepass">
                                <div class="card-header">
                                    <h5 class="mb-0">Change Password</h5>
                                </div>
                                <div class="card-body bg-light">
                                    <form>
                                        <div class="form-group">
                                            <label for="old-password">Old Password</label>
                                            <input class="form-control" id="old-password" type="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="new-password">New Password</label>
                                            <input class="form-control" id="new-password" type="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="confirm-password">Confirm Password</label>
                                            <input class="form-control" id="confirm-password" type="password">
                                        </div>
                                        <div class="validate-pass" style="color:red;"></div>
                                        <div class="validate-success" style="color:green;"></div>
                                        <button class="btn btn-primary btn-block" type="button" onclick="updatepassword();">Update Password</button>
                                    </form>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Danger Zone</h5>
                                </div>
                                <div class="card-body bg-light">
                                    <h5 class="fs-0">Delete this account</h5>
                                    <p class="fs--1">Once you delete a account, there is no going back. Please be certain.</p><button class="btn btn-falcon-danger d-block" onclick="decativate()">Deactivate Account</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="toast bg-white notice" id="cookie-notice" role="alert" data-options='{"autoShow":false,"autoShowDelay":3000,"showOnce":true,"cookieExpireTime":7200000}' data-autohide="false" aria-live="assertive" aria-atomic="true">
                <div class="toast-body d-flex justify-content-center px-5">
                    <div class="d-lg-flex align-items-center text-center">
                        <button class="close text-shadow-none position-absolute t-0 r-0 p-2 mr-2 mt-2" type="button" data-dismiss="toast" aria-label="Close"><span class="font-weight-medium" aria-hidden="true">×</span></button><img class="mr-2" src="assets/img/icons/cookie.png" width="20" alt="" />
                        <p class="mb-2 mb-lg-0">
                            Our site uses cookies. By continuing to use our site, you agree to our <a class="text-underline" href="components/cookie-notice.html">Cookie Policy</a>.</p>
                        <button class="btn btn-primary btn-sm ml-3" type="button" data-dismiss="toast" aria-label="Close">Ok, I Understand</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/lib/@fortawesome/all.min.js"></script>
    <script src="assets/lib/stickyfilljs/stickyfill.min.js"></script>
    <script src="assets/lib/sticky-kit/sticky-kit.min.js"></script>
    <script src="assets/lib/is_js/is.min.js"></script>
    <script src="assets/lib/lodash/lodash.min.js"></script>
    <script src="assets/lib/perfect-scrollbar/perfect-scrollbar.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <script src="assets/lib/fancybox/jquery.fancybox.min.js"></script>
    <script src="assets/lib/flatpickr/flatpickr.min.js"></script>
    <script src="assets/js/theme.js"></script>
    
    <script src="assets/js/dark.js"></script>
    <script src="assets/js/supportandfeedback.js"></script>
    <script src="assets/js/logout.js"></script>

</body>

</html>

<?php
}
else{
    echo "<script>window.open('index.php','_self');</script>";
    }
    }
?>