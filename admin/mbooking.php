<?php session_start();if(!isset($_SESSION['emailid']) || !isset($_SESSION['role']) || $_SESSION['role']==1){header("location:../index.php");}

else{
   require_once("../database/database.php");
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
    <title>Cross Fit | Bookings</title>
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
    <script src="assets/js/fetch.js"></script>
     <script src="assets/js/supportandfeedback.js"></script><script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <script src="assets/js/config.navbar-vertical.js"></script>
    <script src="assets/js/logout.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="assets/lib/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet">
    <link href="assets/lib/datatables-bs4/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="assets/lib/datatables.net-responsive-bs4/responsive.bootstrap4.css" rel="stylesheet">
    <link href="assets/lib/leaflet/leaflet.css" rel="stylesheet">
    <link href="assets/lib/leaflet.markercluster/MarkerCluster.css" rel="stylesheet">
    <link href="assets/lib/leaflet.markercluster/MarkerCluster.Default.css" rel="stylesheet">
    
    <script>
        if (window.localStorage.getItem("site-theme") == "dark")
            document.write('<link href="assets/css/theme-dark.css" rel="stylesheet"  id="light">');
        else
            document.write('<link href="assets/css/theme.css" rel="stylesheet"  id="light">');

    </script>


    <!--Countries For Mobile Feild Script-->
    <script type="text/javascript" src="intl-tel-input/build/js/intlTelInput-jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="intl-tel-input/build/css/intlTelInput.css">
</head>

<style>
    .iti {
        display: block !important;
        /* margin-top: 5px;*/
    }

    .iti__country-list {
        max-width: 400px !important;
        border-radius: 5px !important;
    }

    .icons-org-create {
        display: inline-flex;
        align-items: center;
        position: relative;
    }

    .icons-org-create .icon-users {
        height: 4rem;
        width: 4rem;
    }

    .icons-org-create .icon-users circle,
    .icons-org-create .icon-users path:first-of-type {
        color: #0061f2;
    }

    .icons-org-create .icon-users path {
        color: rgba(0, 97, 242, 0.35);
    }

    .icons-org-create .icon-plus {
        color: #0061f2;
        position: absolute;
        font-size: 1.5rem;
        top: -0.5rem;
        right: -0.75rem;
    }

    .icons-org-join {
        display: inline-flex;
        position: relative;
    }

    .icons-org-join .icon-user {
        height: 4rem;
        width: 4rem;
        color: #6900c7;
    }

    .icons-org-join .icon-arrow {
        font-size: 2rem;
        margin: 1rem 0.5rem 1rem 0;
        color: #6900c7;
    }

    .icons-org-join .icon-users {
        margin: 0.5rem 0;
        height: 3rem;
        width: 3rem;
    }

    .icons-org-join .icon-users circle,
    .icons-org-join .icon-users path:first-of-type {
        color: rgba(105, 0, 199, 0.5);
    }

    .icons-org-join .icon-users path {
        color: rgba(105, 0, 199, 0.25);
    }

    .btn-join {
        color: white !important;
        background: #6900c7;
    }

    .btn-join:hover {
        color: white !important;
        background: #5500a1 !important;
    }

    .btn-create {
        color: white !important;
        background: #0061f2;
    }

    .btn-create:hover {
        color: white !important;
        background: #0052cc !important;
    }



    .tooltip-inner {
        max-width: 190px;
        padding: 3px 5px;
        color: #000;
        text-align: center;
        background-color: #fff;
        border-radius: .25rem;
        border: 1px solid #000;
    }

    .bs-tooltip-bottom .arrow::before,
    .bs-tooltip-auto[x-placement^=bottom] .arrow::before {
        bottom: 0;
        border-width: 0 0.5rem 0.5rem;
        border-bottom-color: #e3a131 !important;
    }

    .info {
        color: #e3a131;
        font-size: 15px;
    }

    .form-control {
        color: #687281;
    }
</style>

<body>



    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">


        <div class="container-fluid" data-layout="container">
            <nav class="navbar navbar-vertical navbar-expand-xl navbar-vibrant">
                <div class="d-flex align-items-center">
                    <div class="toggle-icon-wrapper">

                        <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-toggle="tooltip"
                            data-placement="left"><span class="navbar-toggle-icon"><span
                                    class="toggle-line"></span></span></button>

                    </div><a class="navbar-brand" href="index.html">
                        <div class="d-flex align-items-center py-3"><span
                                class="text-sans-serif" style="font-size:1rem; color:#009da0;">CROSS <span
                                    style="color:#FF9933;">FIT </span><span
                                    style="color: #138808">ARENA</span></span>
                        </div>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
                    <div class="navbar-vertical-content perfect-scrollbar scrollbar">
                        <ul class="navbar-nav flex-column" id="manual">
                           

                        </ul>
                    </div>
                </div>
            </nav>







            <div class="content">
                <nav class="navbar navbar-light navbar-glass navbar-top sticky-kit navbar-expand">

                    <button class="btn navbar-toggler-humburger-icon navbar-toggler mr-1 mr-sm-3" type="button"
                        data-toggle="collapse" data-target="#navbarVerticalCollapse"
                        aria-controls="navbarVerticalCollapse" aria-expanded="false"
                        aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span
                                class="toggle-line"></span></span></button>
                    <a class="navbar-brand mr-1 mr-sm-3" href="index.html">
                        <div class="d-flex align-items-center"><img class="mr-2"
                                src="assets/img/illustrations/video.png" alt="" width="40" /><span
                                class="text-sans-serif" style="font-size:1rem; color:#009da0;">Impact <span
                                    style="color:#FF9933;">M</span><span style="color:#fff;">e</span><span
                                    style="color: #138808">et</span></span>
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
                    $(document).ready(function () {

                        $('#dark-mode').change(function () {
                            if (this.checked) {
                                goDark("dark");
                            } else {
                                goDark("light");
                            }
                        });
                    });
                </script>



<input class="form-control" id="email2id" type="hidden" value="<?php echo $_SESSION['emailid'];?>">

                

                <!-- Modal -->
                <div class="modal fade" id="createbooking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Book a Event</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form method="post" role="form" id="contact_form">
                                <div class="modal-body">


                                    <div class="form-row">
                                        <div class="form-group col-md-12"><label class="text-dark"
                                                for="inputName">Name</label><input class="form-control py-4"
                                                id="inputTopic" name="inputTopic" type="text"
                                                placeholder="Your Name" /></div>

                                    </div>
                                    <div class="validate-bookname" style="color:red;"></div>
                                <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="text-dark" for="inputProblem">Choose Field</label>
                                        <select class="form-control" style="height:3.125rem"
                                        id="inputProblem" name="inputProblem">
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="5aside">5 A Side</option>
                                        <option value="7aside">7 A Side</option>
                                        <option value="Cricket">Cricket</option>
                                        <option value="PS5">PS5</option>
                                        <option value="Batminton">Batminton</option>
                                    </select>
                               <div class="validate-bookevent" style="color:red;"></div>
                                </div>
                            </div>
                            
                                <div class="form-row">
                                        <div class="form-group col-md-6"><label class="text-dark"
                                                for="inputDate">Date</label><input class="form-control py-4" id="date"
                                                name="date" type="date" />
                                                 <div class="validate-bookdate" style="color:red;"></div>
                                         </div>
                                           
                                                <div class="form-group col-md-6">
                                            <div class="form-row">
                                                <label class="text-dark col-md-12" for="inputTime">Time</label>
                                                <div class="form-group col-md-12"><input type="time"
                                                        class="form-control py-4" name="inputTime" id="inputTime"></div>
                                            <div class="validate-booktime" style="color:red;"></div>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            window.onload = function() {
                                                var usernamevalue=filteruser('<?php echo $_SESSION['emailid'];?>');
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
                                    </div>

                                    <div class="form-row">
                                        


                                        <div class="col-md-6">
                                            <div class="form-row">

                                                <label class="text-dark col-md-12" for="inputTime">Duration</label>
                                                <div class="form-group col-md-6"><select class="form-control"
                                                        style="height:3.125rem" name="num_hours" id="num_hours">
                                                        <option selected disabled>Hours</option>
                                                    </select></div>
                                                <div class="form-group col-md-6"><select class="form-control"
                                                        style="height:3.125rem; padding:0.5rem 0.7rem;"
                                                        name="num_minutes" id="num_minutes">
                                                        <option selected disabled>Minutes</option>
                                                    </select></div>
                                                    
                                            </div>
                                            <div class="validate-bookminuts" style="color:red;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" id="create_me"
                                        style="margin: auto" onclick="intBooking();">Book</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
               




                
                 <div class="card mb-3">
                    <div class="card-header">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-4 col-sm-auto d-flex align-items-center pr-0">
                                <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">User Bookings</h5>
                            </div>
                           
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="falcon-data-table">
                            <table class="table table-sm mb-0 table-striped table-dashboard fs--1 data-table border-bottom border-200" data-options='{"searching":true,"responsive":false,"info":false,"lengthChange":false,"sWrapper":"falcon-data-table-wrapper","dom":"<&#39;row mx-1&#39;<&#39;col-sm-12 col-md-6&#39;l><&#39;col-sm-12 col-md-6&#39;f>><&#39;table-responsive&#39;tr><&#39;row no-gutters px-1 py-3 align-items-center justify-content-center&#39;<&#39;col-auto&#39;p>>","language":{"paginate":{"next":"<span class=\"fas fa-chevron-right\"></span>","previous":"<span class=\"fas fa-chevron-left\"></span>"}}}'>
                                <thead class="bg-200 text-900">
                                    <tr>
                                        <th class="align-middle sort">#</th>
                                        <th class="align-middle sort">Booking ID</th>
                                        <th class="align-middle sort">User name</th>
                                        <th class="align-middle sort">Start Date/Time</th>
                                    
                                         <th class="align-middle sort">End Date/Time</th>
                                        <th class="align-middle sort">Event</th>
                                        <th class="align-middle sort">Price</th>
                                        
                                        <th class="align-middle sort">Action</th>
                                    </tr>
                                </thead>
                                 <tbody id="orders">
                                <?php 
                                 $con=new DbConnector();
               $sql = "SELECT * FROM `ubookings`";
               $stmt = $con->prepare($sql); 
               $stmt->execute();
               $dbfname="";
               $dblname="";
               $dbphone="";
               $i=0;
               $result = $stmt->get_result();
               if($result){
                while($row = $result->fetch_assoc()) {
                    $i++;
                  $dbbookingID=$row['bID'];
                  $dbbookingTime=$row['bdate'];
                  $splitTimeStamp = explode(" ",$dbbookingTime);
                  $dbbookingDate = $splitTimeStamp[0];
                  $dbbookingTimes = $splitTimeStamp[1];
                  $dbendtime=$row['edate'];
                  $username=$row['uemail'];
                  $dbbookingEvent=$row['eventField'];
                  $timestamp1 = strtotime($dbbookingTime);
                  $timestamp2 = strtotime($dbendtime);
                 if($dbbookingEvent=="7aside"){
                   $price=700; 
                 }else if($dbbookingEvent=="5aside"){
                    $price=500; 
                 }else if($dbbookingEvent=="Cricket"){
                    $price=300;
                 }else if($dbbookingEvent=="PS5"){
                    $price=100;
                 }else if($dbbookingEvent=="Batminton"){
                     $price=75;
                 }

                  $hour = round(abs($timestamp1 - $timestamp2)/(60*60)*$price);
               ?>
                               
                                    <tr class="btn-reveal-trigger">
                                         
                                        <td class="py-2 align-middle"><?php echo($i); ?></td>
                                        <td class="py-2 align-middle" id="<?php echo($dbbookingID); ?>"><?php echo($dbbookingID); ?></td>
                                        <td class="py-2 align-middle">
                                           <?php echo($username); ?>
                                        </td>
                                        <td class="py-2 align-middle"><?php echo($dbbookingTime); ?></td>
                                        
                                         <td class="py-2 align-middle">
                                           <?php echo($dbendtime); ?>
                                        </td>
                                        <td class="py-2 align-middle">
                                           <?php echo($dbbookingEvent); ?>
                                        </td>
                                        <td class="py-2 align-middle">
                                           <?php echo($hour); ?>
                                        </td>

                                        
                                         <td class="py-2 align-middle white-space-nowrap">
                <a class="dropdown-item text-danger" style="cursor:pointer; " onclick="return deleteBooking('<?php echo($dbbookingID); ?>')">Delete</a>
                                        </td>
                                       
                                    </tr>
                                
                            <?php } } ?>
                            </tbody>
                            </table>
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
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:100,200,300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <script src="assets/lib/chart.js/Chart.min.js"></script>
    <script src="assets/lib/datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/lib/datatables-bs4/dataTables.bootstrap4.min.js"></script>
    <script src="assets/lib/datatables.net-responsive/dataTables.responsive.js"></script>
    <script src="assets/lib/datatables.net-responsive-bs4/responsive.bootstrap4.js"></script>
    <script src="assets/lib/leaflet/leaflet.js"></script>
    <script src="assets/lib/leaflet.markercluster/leaflet.markercluster.js"></script>
    <script src="assets/lib/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js"></script>
    <script src="assets/js/theme.js"></script>

    <script src="assets/js/dark.js"></script>
     <script src="assets/js/pupdateuser.js"></script>
    

    <script src='https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js'></script>
    <script>
        feather.replace();
    </script>
</body>

</html>
<?php
    
}

?>