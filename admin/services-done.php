<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
}

// Fetch service data from the database
$query = "SELECT ServiceName FROM `tblinvoice` INNER JOIN `tblcustomers` ON tblinvoice.Userid = tblcustomers.ID INNER JOIN tblservices ON tblservices.ID = tblinvoice.ServiceId";
$result = mysqli_query($con, $query);

$serviceNames = array();

while ($row = mysqli_fetch_assoc($result)) {
    $serviceNames[] = $row['ServiceName'];
}

$serviceCounts = array_count_values($serviceNames);
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Services Done</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->
<!--Calender-->
<link rel="stylesheet" href="css/clndr.css" type="text/css" />
<script src="js/underscore-min.js" type="text/javascript"></script>
<script src= "js/moment-2.2.1.js" type="text/javascript"></script>
<script src="js/clndr.js" type="text/javascript"></script>
<script src="js/site.js" type="text/javascript"></script>
<!--End Calender-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
<div class="main-content">
    <?php include_once('includes/sidebar.php');?>
    <?php include_once('includes/header.php');?>
    <div id="page-wrapper" class="row calender widget-shadow">
        
                            <div class="row">
                              <?php
                              foreach ($serviceCounts as $service => $count) {
                                  ?>
                                  

                                  <div class="row-one">
					<div class="col-md-4 widget">
						
						<div class="stats-left ">
							<h5>Total</h5>
							<h4><?php echo $service; ?></h4>
						</div>
						<div class="stats-right">
							<label> <?php echo $count; ?></label>
						</div>
						<div class="clearfix"> </div>	
					</div>
                                  <?php
                                  
                              }
                              ?>
                              <div class="row calender widget-shadow">
					
					
                          </div>

                        <div class="clearfix"> </div>   
                    </div>
                    <div class="clearfix"> </div>  

    <!--footer-->
    <!--//footer-->
</div>
    <!-- Classie -->
    <script src="js/classie.js"></script>
    <script>
        var menuLeft = document.getElementById('cbp-spmenu-s1'),
            showLeftPush = document.getElementById('showLeftPush'),
            body = document.body;

        showLeftPush.onclick = function() {
            classie.toggle(this, 'active');
            classie.toggle(body, 'cbp-spmenu-push-toright');
            classie.toggle(menuLeft, 'cbp-spmenu-open');
            disableOther('showLeftPush');
        };

        function disableOther(button) {
            if (button !== 'showLeftPush') {
                classie.toggle(showLeftPush, 'disabled');
            }
        }
    </script>
    <!--scrolling js-->
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/scripts.js"></script>
    <!--//scrolling js-->
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"> </script>
</body>
</html>

