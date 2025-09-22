<?php
session_start();
if($_SESSION['admin']=="")
{
header("location:login.php");
}
include("dbconnect.php");
extract($_REQUEST);



?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title><?php include("title.php"); ?></title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <!-- slick slider -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
  <!-- animation css -->
  <link rel="stylesheet" href="plugins/animate/animate.css">
  <!-- aos -->
  <link rel="stylesheet" href="plugins/aos/aos.css">
  <!-- venobox popup -->
  <link rel="stylesheet" href="plugins/venobox/venobox.css">

  <!-- Main Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
  
  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>

<body>
  

<!-- header -->
<header class="fixed-top header">
  <!-- top header -->
  <div class="top-header py-2 bg-white">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-lg-4 text-center text-lg-left">
          <?php include("title2.php"); ?>
          <!--<ul class="list-inline d-inline">
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-facebook"></i></a></li>
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-linkedin"></i></a></li>
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-instagram"></i></a></li>
          </ul>-->
        </div>
        <div class="col-lg-8 text-center text-lg-right">
          <ul class="list-inline">
            <!--<li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="register.php">Register</a></li>-->
            <!--<li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="research.html">research</a></li>
            <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="scholarship.html">SCHOLARSHIP</a></li>
            <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="#" data-toggle="modal" data-target="#loginModal">login</a></li>
            <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="#" data-toggle="modal" data-target="#signupModal">register</a></li>-->
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- navbar -->
  <div class="navigation w-100">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light p-0">
        <a class="navbar-brand" href=""><img src="images/logo.png" alt="logo"></a>
        <button class="navbar-toggler rounded-0" type="button" data-toggle="collapse" data-target="#navigation"
          aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navigation">
          <ul class="navbar-nav ml-auto text-center">
            <li class="nav-item @@home active">
              <a class="nav-link" href="admin.php">Home</a>
            </li>
			
            
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</header>
<!-- /header -->
<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h3>Admin</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login">
                 
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h3>Admin</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               
            </div>
        </div>
    </div>
</div>

<!-- page title -->
<section class="page-title-section overlay" data-background="images/backgrounds/page-title.jpg">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Admin</a></li>
          <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
        </ul>
        <p class="text-lighten"></p>
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- contact -->
<section class="section bg-gray">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="section-title">Bus Route  Information</h2>
		<a href="register.php">Add New</a>
      </div>
    </div>
	<p>&nbsp;</p>
    <div class="row">
      <div class="col-md-12">
       
	   <form name="form1" method="post">
	   		
			<div class="row">
			<div class="col-md-4">
		   <select name="dtpoint" class="form-control mb-3">
			<option value="">-Source-</option>
			<?php
			$cq=mysqli_query($connect,"select distinct(dtpoint) from bus_route");
			while($cr=mysqli_fetch_array($cq))
			{
			?>
			<option <?php if($cr['dtpoint']==$dtpoint) echo "selected"; ?>><?php echo $cr['dtpoint']; ?></option>
			<?php
			}
			?>
			</select>
			</div>
			<div class="col-md-4">
		   <select name="dspoint" class="form-control mb-3">
			<option value="">-Destination-</option>
			<?php
			$cq1=mysqli_query($connect,"select distinct(dspoint) from bus_route");
			while($cr1=mysqli_fetch_array($cq1))
			{
			?>
			<option <?php if($cr1['dspoint']==$dspoint) echo "selected"; ?>><?php echo $cr1['dspoint']; ?></option>
			<?php
			}
			?>
			</select>
			</div>
			<div class="col-md-4">
			<input type="submit" name="btn" class="btn" value="Go">
			</div>
			</div>
	   </form>
	   <p>&nbsp;</p>
	   <?php
	   $q1=mysqli_query($connect,"select * from bus_route where dtpoint='$dtpoint' and dspoint='$dspoint'");
	   $n1=mysqli_num_rows($q1);
	   if($n1>0)
	   {
	   ?>
	   <table border="0" class="table">
	   <tr>
	   <th>#</th>
	   <th>Driver</th>
	   <th>Bus No.</th>
	   <th>Route</th>
	   <th>Distance</th>
	   <th>Duration</th>
	   <th>Fare</th>
	   <th>Location Update</th>
	   </tr>
	   
	   <?php
	   $i=0;
	   
	   while($r1=mysqli_fetch_array($q1))
	   {
	   $i++
	   ?>
	   <tr>
	   <td><?php echo $i; ?></td>
	   <td><?php echo $r1['driver']; ?></td>
	   <td><?php echo $r1['busno']; ?></td>
	   <td><?php echo $r1['rname']; ?></td>
	   <td><?php echo $r1['dist'].'- KM'; ?></td>
	   <td><?php echo $r1['duration'].'- Hours'; ?></td>
	   <td><?php echo $r1['fare']; ?></td>
     <td><a href="admin.php?act=update&bid=<?php echo $r1['id'];?>">Refresh</a></td>
	   
<!-- 	   <td><?php echo '<a href="admin.php?act=del&did='.$r1['id'].'">Delete</a>'; ?></td>
 -->	   </tr>
	   <?php
	   }
	   ?>
	   </table>
	   
	   <?php
	   }
	   ?>
      </div>
      
    </div>
  </div>
</section>
<!-- /contact -->

<!-- gmap -->
<section class="section pt-0">
  <!-- Google Map -->
 
</section>
<!-- /gmap -->

<!-- footer -->
<td>
    <a href="admin.php?act=update&bid=<?php echo $r1['id']; ?>">Refresh</a>
</td>

<?php
if ($act == "update") {
    // Get the bus ID from the query string
    $bid = $_GET['bid']; 
    ?>
    <form action="" method="post" id="locationForm">
        <input type="hidden" class="form-control mb-3" id="lat" name="lat">
        <input type="hidden" class="form-control mb-3" id="lon" name="lon">
    </form>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Automatically fetch location on page load
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function (position) {
                    const lat = position.coords.latitude;
                    const lon = position.coords.longitude;

                    // Populate the hidden form fields
                    document.getElementById("lat").value = lat;
                    document.getElementById("lon").value = lon;

                    // Delay submission using setTimeout
                    setTimeout(function () {
                        document.getElementById("locationForm").submit();
                    }, 5000); // Delay of 2000ms (2 seconds)
                },
                function (error) {
                    console.error("Error fetching location:", error.message);
                    alert("Failed to fetch location. Please enable location access.");
                }
            );
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    });
    </script>
    <?php

    // Handle the form submission and update the database
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $lat = $_POST['lat'];
        $lon = $_POST['lon'];

        // Update the database with new lat and lon
        $query = "UPDATE bus_route SET lat='$lat', lon='$lon' WHERE id=$bid";
        if (mysqli_query($connect, $query)) {
            echo "<script>
                alert('Location updated successfully!');
                window.location.href = 'admin.php';
            </script>";
        } else {
            echo "<script>alert('Failed to update location.');</script>";
        }
    }
}
?>

<footer>
  <!-- newsletter -->
  <div class="newsletter">
    <div class="container">
      <!--<div class="row">
        <div class="col-md-9 ml-auto bg-primary py-5 newsletter-block">
          <h3 class="text-white">Subscribe Now</h3>
          <form action="#">
            <div class="input-wrapper">
              <input type="email" class="form-control border-0" id="newsletter" name="newsletter" placeholder="Enter Your Email...">
              <button type="submit" value="send" class="btn btn-primary">Join</button>
            </div>
          </form>
        </div>
      </div>-->
    </div>
  </div>
  <!-- footer content -->
  <div class="footer bg-footer section border-bottom">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-sm-8 mb-5 mb-lg-0">
          <!-- logo -->
          <a class="logo-footer" href=""><img class="img-fluid mb-4" src="images/logo.png" alt="logo"></a>
          
        </div>
        <!-- company -->
        <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
          <h4 class="text-white mb-5">Links</h4>
          <ul class="list-unstyled">
            <li class="mb-3"><a class="text-color" href="admin.php">Home</a></li>
            <li class="mb-3"><a class="text-color" href="register.php">Student</a></li>
            <li class="mb-3"><a class="text-color" href="logout.php">Logout</a></li>
          </ul>
        </div>
        <!-- links -->
       <!-- <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
          <h4 class="text-white mb-5">LINKS</h4>
          <ul class="list-unstyled">
            <li class="mb-3"><a class="text-color" href="courses.html">Courses</a></li>
            <li class="mb-3"><a class="text-color" href="event.html">Events</a></li>
            <li class="mb-3"><a class="text-color" href="gallary.html">Gallary</a></li>
            <li class="mb-3"><a class="text-color" href="faqs.html">FAQs</a></li>
          </ul>
        </div>-->
        <!-- support -->
       <!-- <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
          <h4 class="text-white mb-5">SUPPORT</h4>
          <ul class="list-unstyled">
            <li class="mb-3"><a class="text-color" href="#">Forums</a></li>
            <li class="mb-3"><a class="text-color" href="#">Documentation</a></li>
            <li class="mb-3"><a class="text-color" href="#">Language</a></li>
            <li class="mb-3"><a class="text-color" href="#">Release Status</a></li>
          </ul>
        </div>-->
        <!-- support -->
      <!--  <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
          <h4 class="text-white mb-5">RECOMMEND</h4>
          <ul class="list-unstyled">
            <li class="mb-3"><a class="text-color" href="#">WordPress</a></li>
            <li class="mb-3"><a class="text-color" href="#">LearnPress</a></li>
            <li class="mb-3"><a class="text-color" href="#">WooCommerce</a></li>
            <li class="mb-3"><a class="text-color" href="#">bbPress</a></li>
          </ul>
        </div>-->
      </div>
    </div>
  </div>
  <!-- copyright -->
  <div class="copyright py-4 bg-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-7 text-sm-left text-center">
          <p class="mb-0">
		  
		  
		  <a href=""><?php include("title.php"); ?></a></p>
        </div>
        <div class="col-sm-5 text-sm-right text-center">
         
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- /footer -->

<!-- jQuery -->
<script src="plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="plugins/slick/slick.min.js"></script>
<!-- aos -->
<script src="plugins/aos/aos.js"></script>
<!-- venobox popup -->
<script src="plugins/venobox/venobox.min.js"></script>
<!-- mixitup filter -->
<script src="plugins/mixitup/mixitup.min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="plugins/google-map/gmap.js"></script>

<!-- Main Script -->
<script src="js/script.js"></script>

</body>
</html>