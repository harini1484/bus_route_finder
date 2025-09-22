<?php
/* include("protect.php");
 */include("dbconnect.php");
 extract($_REQUEST);
session_start();
$uname=$_SESSION['admin'];
$q2 = mysqli_query($connect, "SELECT * FROM bus_route ORDER BY id DESC LIMIT 1");
$fetchloc = mysqli_fetch_array($q2);
$map_url = "https://maps.google.com/?q=" . $fetchloc['lat'] . "," . $fetchloc['lon'];



/* $qry=mysqli_query($connect,"select * from ha_student where regno='$uname'");
$row=mysqli_fetch_array($qry);
$dept=$row['dept'];
$batch=$row['year']; */
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
  <style>
    .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 1000;
        }

        .popup {
            display: flex;
            flex-direction: row;
            background: #fff;
            width: 60%;
            max-width: 800px;
            height: 60%;
            margin: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            overflow: hidden;
        }

        .popup img {
            width: 50%;
            height: 100%;
            object-fit: cover;
        }

        .popup .form-container {
            width: 50%;
            padding: 20px;
        }

        .form-container h3 {
            margin: 0 0 20px;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-container input,
        .form-container button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container button {
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .form-container button:hover {
            background: #ffbc3b;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: transparent;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }
  </style>
<script language="javascript">
function getCode()
{

document.form1.barcode.focus();
}
</script>
</head>

<body onLoad="getCode()">
  

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
            <li class="nav-item @@home">
              <a class="nav-link" href="userhome.php">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="bookingdet.php">Map</a>
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
                <h3>Staff</h3>
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
                <h3>Student</h3>
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
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">MAP</a></li>
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
        <h2 class="section-title">Live Location </h2>
      </div>
    </div>
	<p>&nbsp;</p>
  
	   <?php
     
	   $q1=mysqli_query($connect,"select * from booking where user='$uname'");
	   $n1=mysqli_num_rows($q1);
	   if($n1>0)
	   {
	   ?>
	   <table border="0" class="table">
	   <tr>
	   <th>#</th>
	   <th>Bus No.</th>
	   <th>Source And Destination</th>
	   <th>Driver</th>
     <th>Timer</th>
	   <th>Booking Date</th>
	   <th>Action</th>
	   
	   </tr>
	   
	   <?php
	   $i=0;
	   
	   while($r1=mysqli_fetch_array($q1))
	   {
	   $i++
	   ?>
	   <tr>
	   <td><?php echo $i; ?></td>
	   <td><?php echo $r1['busno']; ?></td>
       <td>
        <?php
        $query=mysqli_query($connect, "select * from bus_route where busno='".$r1['busno']."'");
        $bus_fetch=mysqli_fetch_array($query);
        echo $bus_fetch['dtpoint'] . " - " . $bus_fetch['dspoint'] . "<br>" . "Bus Routes - " . $bus_fetch['rname'];
        ?>

       </td>
	   <td><?php echo $r1['driver']; ?></td>
     <td><?php echo $r1['Timer']; ?></td>
	   <td><?php echo $r1['rdate']; ?></td>
       <td><p>Location: <a href="<?php echo $map_url; ?>" target="_blank">Map</a></p>
      </td>
     	   </tr>
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

<div class="popup-overlay" id="popupOverlay">
        <div class="popup">
            <!-- Left-side Image -->
            <img src="images/backgrounds/buss.jpg" alt="Bus Image" class="img img-responsive">

            <!-- Right-side Booking Form -->
            <div class="form-container">
                <button class="close-btn" onclick="closePopup()">�</button>
                <h3>Alert Notification</h3>
                <form action="" method="POST">
                    <input type="hidden" id="busId" name="bid">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                    
                    <label for="PhoneNo">Phone:</label>
                    <input type="number" id="Phone" name="Phone" required>

                    <label for="Timer">Timer:</label>
                    <input type="number" id="Timer" name="Timer" required>
                    
                    <button type="submit" name="Set" class="btn btn-success">Set Now</button>
                </form>
            </div>
        </div>
    </div>
    <?php
    extract($_POST);

    if(isset($book)){
      $rdate=date("d-m-Y");
      $mq=mysqli_query($connect,"select max(id) from bus_route");
      $mr=mysqli_fetch_array($mq);
      $id=$mr['max(id)']+1;
      
      $q1=mysqli_query($connect,"select * from bus_route where id='$bid'");
      $row=mysqli_fetch_array($q1);
      $busno=$row['busno'];
      $driver=$row['driver'];

      $ins=mysqli_query($connect,"insert into booking(id,busno,driver,user,rdate,lat,lon) values($id,'$busno','$driver','$uname','$rdate','','')");
      if($ins)
      {
      


      $msg="STOP ALERT Successfully done";
    ?>
    <script>
    //Using setTimeout to execute a function after 5 seconds.
    setTimeout(function () {
      //Redirect with JavaScript
      window.location.href= 'userhome.php';
    }, 3000);
    </script>
    <?php
      }
      else
      {
      ?>
    <script language="javascript">
      alert("STOP ALERT Successfully done");
      </script>
    <?php
      }
    }

?>



    
    

    <script>
        // Open Popup
        function openPopup(busId) {
            document.getElementById("popupOverlay").style.display = "block";
            document.getElementById("busId").value = busId;
        }

        // Close Popup
        function closePopup() {
            document.getElementById("popupOverlay").style.display = "none";
        }
    </script>
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
            <li class="mb-3"><a class="text-color" href="staff.php">Home</a></li>
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
<script src="https://www.google.co.in/maps/@13.115297,80.2432831,12z?entry=ttu&g_ep=EgoyMDI1MDMzMC4wIKXMDSoASAFQAw%3D%3D"></script>
<script src="plugins/google-map/gmap.js"></script>

<!-- Main Script -->
<script src="js/script.js"></script>

</body>
</html>