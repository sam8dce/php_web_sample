<!doctype html>
<?php 
error_reporting(0);

if(isset($_POST['sent'])){
    
$name=$_POST['name'];
$mobno=$_POST['mobno'];
$email=$_POST['email'];
$comments=$_POST['comments'];

 $succ = $Err = $nameErr = $emailErr = $mobilenoErr = ""; 
    //String Validation  
    if (empty($_POST["name"])) {  
         $nameErr = "Name is required";  
    } else {  
         
            // check if name only contains letters and whitespace  
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
                $nameErr = "Only alphabets and white space are allowed";  
            }  
    }  

    if (empty($_POST["mobno"])) {  
            $mobilenoErr = "Mobile no is required";  
    } else {  
           
            // check if mobile no is well-formed  
            if (!preg_match ("/^[0-9]*$/", $mobno) ) {  
            $mobilenoErr = "Only numeric value is allowed.";  
            }  
        //check mobile no length should not be less and greator than 10  
        if (strlen($mobileno)!= 10) {  
            $mobilenoErr = "Mobile no must contain 10 digits.";  
            }  
     }  
    
    
    //Email Validation   
    if (empty($_POST["email"])) {  
            $emailErr = "Email is required";  
    } else {  
            
            // check that the e-mail address is well-formed  
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                $emailErr = "Invalid email format";  
            }  
     }  


  if (!empty($_POST["name"]) && !empty($_POST["mobno"]) && !empty($_POST["email"])) {

      $to = $email;

              $subject = "New Feedback '" . date('d/m/Y H:i:s') . "'";

              $message='';
                   $message .= '<table rules="all" style="border-color: #666;" cellpadding="10" cellspacing="10" border="1">';
                   $message .= "<tr style='background: #eee;'><td><strong>Name</strong> </td><td>" . "$name" . " </td></tr>";
                   $message .= "<tr style='background: #eee;'><td><strong>Mobile</strong> </td><td>" . "$mobno" . "</td></tr>";
                   $message .= "<tr style='background: #eee;'><td><strong>Email</strong> </td><td>" . "$email" . "</td></tr>";
                   $message .= "<tr style='background: #eee;'><td><strong>comments</strong> </td><td>" . "$comments" . "</td></tr>";
                   
                  $message .= '</table>';
                  $headers = "MIME-Version: 1.0" . "\r\n";
                  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                  

                  // More headers
                   $headers .= 'From: <' . $email . '>' . "\r\n";
                   $headers .= 'Bcc: w.anwar@xperthrs.com,zeya7270@gmail.com' . "\r\n";
                   if(mail($to,$subject,$message,$headers)){
                    echo "<script language='javascript' type='text/javascript'>";
                    echo "alert('mail sent we connecting shortly !');";
                    echo "</script>";
                    $succ = "Your Feedback submitted successfully";
                   }else{
                    echo "<script language='javascript' type='text/javascript'>";
                    echo "alert('Mail not send !');";
                    echo "</script>";
                    $Err = "Something worng please try again";
                   }

  }


}
?>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Xperthrs </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

   <!-- CSS here -->
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
   <link rel="stylesheet" href="assets/css/slicknav.css">
   <link rel="stylesheet" href="assets/css/animate.min.css">
   <link rel="stylesheet" href="assets/css/magnific-popup.css">
   <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
   <link rel="stylesheet" href="assets/css/themify-icons.css">
   <link rel="stylesheet" href="assets/css/themify-icons.css">
   <link rel="stylesheet" href="assets/css/slick.css">
   <link rel="stylesheet" href="assets/css/nice-select.css">
   <link rel="stylesheet" href="assets/css/style.css">
   <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
    
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/xpert.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->

    <header>
        <!-- Header Start -->
       <div class="header-area">
            <div class="main-header ">
                <div class="header-top top-bg d-none d-lg-block">
                   <div class="container-fluid">
                       <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left">
                                    <ul>     
                                        <li><i class="fas fa-phone">+91-9312972456</i></li>
                                        <li><i class="fas fa-envelope"></i>w.anwar@xperthrs.com</li>
                                    </ul>
                                </div>
                                <div class="header-info-right">
                                    <ul class="header-social">    
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                       <li> <a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                       </div>
                   </div>
                </div>
               <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-1 col-md-1">
                                <div class="logo">
                                  <a href="index.html"><img src="assets/img/logo/xpert.png" style="width:50px;height:50px" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-8">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav> 
                                        <ul id="navigation">                                                                                                                                     
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="about.php">About</a></li>
                                            <li><a href="services.php">Services</a>
											     <ul class="submenu">    
                                                   <li><a href="technology.php">Technology</a></li>
													<li><a href="realstate.php">Real Estate</a></li>
													<li><a href="telecom.php">Telecom</a></li>
													<li><a href="internet.php">Internet</a></li>
                                                </ul>
											</li>
                                           <li><a href="postresume.php">JOBS</a>
                                                <ul class="submenu">
                                                     
                                                    <li><a href="postresume.php">Submit your CV</a></li>
													<li><a href="contact.php">Contact Now</a></li>
                                                </ul>
                                            </li>
                                             
                                        </ul>
                                    </nav>
                                </div>
                            </div>             
                            <div class="col-xl-2 col-lg-3 col-md-3">
                                <div class="header-right-btn f-right d-none d-lg-block">
                                    <a href="contact.php" class="btn header-btn">Contact Now</a>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
       </div>
        <!-- Header End -->
    </header>

    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/contact_hero.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Contact us</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
            <div class="container">
                <div class="d-none d-sm-block mb-5 pb-4">
                  <div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=S%20%E2%80%93%2040,%20School%20Block,%20Shakarpur,%20Opposite%20Community%20Center%20Delhi%20%E2%80%93%20110092+(Xperthrs)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.mapsdirections.info/en/measure-map-radius/">Radius distance map</a></div>
                    <script>
                        function initMap() {
                            var uluru = {
                                lat: -25.363,
                                lng: 131.044
                            };
                            var grayStyles = [{
                                    featureType: "all",
                                    stylers: [{
                                            saturation: -90
                                        },
                                        {
                                            lightness: 50
                                        }
                                    ]
                                },
                                {
                                    elementType: 'labels.text.fill',
                                    stylers: [{
                                        color: '#ccdee9'
                                    }]
                                }
                            ];
                            var map = new google.maps.Map(document.getElementById('map'), {
                                center: {
                                    lat: -31.197,
                                    lng: 150.744
                                },
                                zoom: 9,
                                styles: grayStyles,
                                scrollwheel: false
                            });
                        }
                    </script>
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&amp;callback=initMap">
                    </script>
    
                </div>
    
    
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Feedback</h2>
                    </div>
                    <div class="col-lg-8">
                        <form class="form-contact "  method="POST" action="">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type='text' class="form-control w-100" name="name" required="" id="name2" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'" placeholder=" Enter Name">
                                        <span class="text-danger"><?php echo $nameErr; ?></span>
                                         <span id="errmsg"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="mobno" id="mobno2" maxlength="10" minlength="10" required="" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your Mobile No'" placeholder="Enter your Mobile No">
                                        <span class="text-danger"><?php echo $mobilenoErr; ?></span>
                                         <span id="errmsg2"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" required="" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                         <span class="text-danger"><?php echo $emailErr; ?></span>
                                    </div>
                                </div>
								
								<div class="col-sm-12">
                                  <div class="form-group">
                                    
                                   <textarea class="form-control rounded-0" name="comments" id="comments" rows="3" placeholder="Comments"></textarea>
                                   </div>
                                </div>
								 
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" name="sent" class="button button-contactForm boxed-btn">Send</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
							<div class="media-body">
                                <h3 class="mb-5">Corporate Office</h3>	      
                            </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>

                            <div class="media-body">
                                <h3>S–40,School Block,Shakarpur,
								Opposite Community Center,Delhi – 110092 </h3>     
                            </div>
                        </div>
						
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>+91-9312972456,+91-9899408786</h3>	      
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>w.anwar@xperthrs.com</h3>
                                <h3>Send us your query anytime!</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- ================ contact section end ================= -->
    
   
    
    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                        	<div class="single-footer-caption mb-30">
							  <!-- logo -->
							 <div class="footer-logo">
								 <a href="index.php"><img src="assets/img/logo/xpert.png" style="width:100px;height:100px;" alt=""></a>
							 </div>
							 <div class="footer-tittle">
								 <div class="footer-pera">
									 <p>Xperthrs are an emerging name in manpower solution</p>
								</div>
							 </div>
							 <!-- social -->
							 <div class="footer-social">
								 <a href="#"><i class="fab fa-facebook-square"></i></a>
								 <a href="#"><i class="fab fa-twitter-square"></i></a>
								 <a href="#"><i class="fab fa-linkedin"></i></a>
								 <a href="#"><i class="fab fa-pinterest-square"></i></a>
							 </div>
						 </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Company</h4>
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="about.php">About Us</a></li>
                                    <li><a href="services.php">Services</a></li>

                                    <li><a href="contact.php">  Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Services</h4>
                                <ul>
                                     <li><a href="technology.php">Technology</a></li>
									 <li><a href="realstate.php">Real Estate</a></li>
									 <li><a href="telecom.php">Telecom</a></li>
									 <li><a href="internet.php">Internet</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Get in Touch</h4>
								<h4>Corporate Office</h4>
                                <ul>
                                 <li><a href="#">9312972456,9899408786</a></li>
                                 <li><a href="#">w.anwar@xperthrs.com</a></li>
                                 <li><a href="#">
                                 S – 40, School Block, Shakarpur,
                                 Opposite Community Center
                                  Delhi – 110092

								 
								 </a></li>
                             </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom aera -->
        <div class="footer-bottom-area footer-bg">
            <div class="container">
                <div class="footer-border">
                     <div class="row d-flex align-items-center">
                         <div class="col-xl-12 ">
                             <div class="footer-copy-right text-center">
                                 <p> 
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved Xperthrs
  </p>
                             </div>
                         </div>
                     </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>

    <!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
		
		<!-- Jquery, Popper, Bootstrap -->
		<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./assets/js/popper.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="./assets/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="./assets/js/owl.carousel.min.js"></script>
        <script src="./assets/js/slick.min.js"></script>
        
		<!-- One Page, Animated-HeadLin -->
        <script src="./assets/js/wow.min.js"></script>
		<script src="./assets/js/animated.headline.js"></script>
		
		<!-- Scrollup, nice-select, sticky -->
        <script src="./assets/js/jquery.scrollUp.min.js"></script>
        <script src="./assets/js/jquery.nice-select.min.js"></script>
		<script src="./assets/js/jquery.sticky.js"></script>
        <script src="./assets/js/jquery.magnific-popup.js"></script>

        <!-- contact js -->
        <script src="./assets/js/contact.js"></script>
        <script src="./assets/js/jquery.form.js"></script>
        <script src="./assets/js/jquery.validate.min.js"></script>
        <script src="./assets/js/mail-script.js"></script>
        <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="./assets/js/plugins.js"></script>
        <script src="./assets/js/main.js"></script>


          <script type="text/javascript">
          $(document).ready(function () {
  //called when key is pressed in textbox
  $("#mobno2").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg2").html("Digits Only").show().fadeOut(4000);
               return false;
    }
   });

 $("#name2").keypress(function(event){
        var inputValue = event.charCode;
        if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
            event.preventDefault();
            $("#errmsg").html("Alphabets Only").show().fadeOut(4000);
        }
    });



});
        </script>
        
    </body>
    
    </html>