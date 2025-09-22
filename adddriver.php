<?php
session_start();
include("dbconnect.php");
/* include 'phpqrcode/qrlib.php';
 */
extract($_REQUEST);
$msg="";
if(isset($btn))
{
$rdate=date("d-m-Y");
$mq=mysqli_query($connect,"select max(id) from driver");
$mr=mysqli_fetch_array($mq);
$id=$mr['max(id)']+1;
$uname="D"."$id";

$pass=rand(1000,5000);
/* $qcode="A".$id."#".$busno;
 */	
/* $qcode = "Bus.no: " . $busno . "\n" .
    "Route: " . $rname . "\n" .
    "Source: " . $dtpoint . "\n" .
    "Destination: " . $dspoint . "\n" .
    "Distance: " . $dist . "\n" .
    "Duration: " . $duration . "\n" .
    "Fare: " . $fare;
$path = 'upload/';
$fn="Q".$id.".png";
$file = $path.$fn;
  
$ecc = 'L';
$pixel_Size = 10;
$frame_Size = 10;
 
$text=$qcode;

$img=QRcode::png($text, $file, $ecc, $pixel_Size, $frame_size); */


$ins=mysqli_query($connect,"insert into driver(id,uname,name,mobile,address,pass,busno) values($id,'$uname','$name','$mobile','$address','$pass','$busno')");
	if($ins)
	{
        $up=mysqli_query($connect, "update bus_route set driver='$uname' where busno='$busno'");
	


	$msg="Added Successfully";
?>
<script>
//Using setTimeout to execute a function after 5 seconds.
setTimeout(function () {
   //Redirect with JavaScript
   window.location.href= 'admin.php';
}, 3000);
</script>
<?php
	}
	else
	{
	?>
 <script language="javascript">
 	alert("Driver Already Added");
	</script>
<?php
	}
}

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
                <h3>Login</h3>
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
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Bus Route</a></li>
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
        <h2 class="section-title">Insert Driver</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-7 mb-4 mb-lg-0">
	  <?php
	  if($msg!="")
	  {
	  ?><span style="color:#009900"><?php echo $msg; ?></span><?php
	  }
	  ?>
        <form action="" name="form1" method="post">
		<input type="text" class="form-control mb-3" name="name" placeholder="Driver Name">
		<input type="text" class="form-control mb-3" name="mobile" placeholder="Mobile">
        <textarea name="address" class="form-control mb-3"></textarea>
		<input type="hidden" class="form-control mb-3" name="busno" value="<?php echo $busno;?>">
		
		
		  
          <button type="submit" name="btn" value="send" class="btn btn-primary">Add</button>
        </form>
      </div>
      <div class="col-lg-5">
	  <img src="images/qratt3.jpg" class="img-fluid">
        <p class="mb-5">As User shows their QR Code during Check to view bus route</p>
		
        
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
            <li class="mb-3"><a class="text-color" href="logout.php">Logout</a></li>
          </ul>
        </div>
       
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
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Automatically fetch location on page load
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            function (position) {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;

                document.getElementById("lat").value=lat
                document.getElementById("lon").value=lon


                
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