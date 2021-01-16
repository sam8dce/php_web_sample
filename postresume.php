 <?php 
include('connection.php'); 
error_reporting(0);

if(isset($_POST['btn'])){


$name=$_POST['name'];
$mobno=$_POST['mobno'];
$email=$_POST['email'];
$comp=$_POST['comp'];
$designation=$_POST['designation'];
$experience=$_POST['exp'];
$salary=$_POST['salary'];

$folder_path = 'uploads/';
$filename = basename($_FILES['file']['name']);
$newname = $folder_path . $filename;
$FileType = pathinfo($newname,PATHINFO_EXTENSION);


     // define variables to empty values  
     $succ = $Err = $nameErr = $emailErr = $mobilenoErr = $genderErr = $websiteErr = $agreeErr = ""; 
    //String Validation  
    if (empty($_POST["name"])) {  
         $nameErr = "Name is required";  
    } else {  
          $name = input_data($_POST["name"]);  
            // check if name only contains letters and whitespace  
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
                $nameErr = "Only alphabets and white space are allowed";  
            }  
    }  

     // Number Validation  
    if (empty($_POST["mobno"])) {  
            $mobilenoErr = "Mobile no is required";  
    } else {  
            $mobileno = input_data($_POST["mobno"]);  
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
            $email = input_data($_POST["email"]);  
            // check that the e-mail address is well-formed  
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                $emailErr = "Invalid email format";  
            }  
     }   
  
//Input fields validation  
 if (!empty($_POST["name"]) && !empty($_POST["mobno"]) && !empty($_POST["email"])) {
    if (move_uploaded_file($_FILES['file']['tmp_name'], $newname)){

           $sql = "INSERT INTO uploadcv(name,mobno,email,comp,designation,exp,salary,resume)
                    VALUES ('$name','$mobno','$email','$comp','$designation','$experience','$salary','$filename')";
    
          $result=mysqli_query($mysqli,$sql);
   
               if($result){
                  $to = $email;
                $subject = "New Resume '" . date('d/m/Y H:i:s') . "'";

              $message='';
                   $message .= '<table rules="all" style="border-color: #666;" cellpadding="10" cellspacing="10" border="1">';
                   $message .= "<tr style='background: #eee;'><td><strong>Name</strong> </td><td>" . "$name" . " </td></tr>";
                   $message .= "<tr style='background: #eee;'><td><strong>Mobile</strong> </td><td>" . "$mobno" . "</td></tr>";
                   $message .= "<tr style='background: #eee;'><td><strong>Email</strong> </td><td>" . "$email" . "</td></tr>";
                   $message .= "<tr style='background: #eee;'><td><strong>company</strong> </td><td>" . "$comp" . "</td></tr>";
                   $message .= "<tr style='background: #eee;'><td><strong>designation</strong> </td><td>" . "$designation" . "</td></tr>";
                   $message .= "<tr style='background: #eee;'><td><strong>experience</strong> </td><td>" . "$experience" . "</td></tr>";
                   $message .= "<tr style='background: #eee;'><td><strong>salary</strong> </td><td>" . "$salary" . "</td></tr>";
                   
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
                    $succ = "Your CV submitted successfully";
                   }else{
                    echo "<script language='javascript' type='text/javascript'>";
                    echo "alert('Mail not send !');";
                    echo "</script>";
                    $Err = "Something worng please try again";
                   }

              
               }else{
                 echo 'data not inserted';
               } 
  
    }else{
       $Err = "Something worng please try again";
    }
	 

 }else{
     $Err = "Required fields are missing";
  } 
 
 
	}
 
 
function input_data($data) {  
  $data =trim($data);  
  $data =stripslashes($data);  
  $data =htmlspecialchars($data);  
  return $data;  
}



     
?>  
	  
  

<!doctype html>
<html class="no-js" lang="zxx">

<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Xperthrs</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- <link rel="manifest" href="site.webmanifest"> -->
   <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
   <!-- Place favicon.ico in the root directory -->
  
  <!-- CSS here -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/slicknav.css">
  <link rel="stylesheet" href="assets/css/animate.min.css">
  <link rel="stylesheet" href="assets/css/magnific-popup.css">
  <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="assets/css/themify-icons.css">
  <link rel="stylesheet" href="assets/css/slick.css">
  <link rel="stylesheet" href="assets/css/nice-select.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/responsive.css">

  <style>
    
    #errmsg
{
color: red;
}
  </style>
</head>

<body>

   <!-- Preloader Start -->
   <div id="preloader-active">
      <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
               <div class="preloader-circle"></div>
               <div class="preloader-img pere-text">
                  <img src="assets/img/logo/xpert.png" style="width:50px;height:50px" alt="">
               </div>
            </div>
      </div>
   </div>
   <!-- Preloader Start-->

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
                                <a href="index.php"><img src="assets/img/logo/xpert.png" style="witdh:50px;height:50px;" alt=""></a>
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
         <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/Industries_hero.jpg">
             <div class="container">
                 <div class="row">
                     <div class="col-xl-12">
                         <div class="hero-cap text-center">
                             <h2>Submit your CV</h2>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- slider Area End-->
	  <div class="row">
                    <div class="col-12 text-center mt-5">
                        <h2 class="contact-title">Submit your cv</h2>
                        <span class="text-danger"><?php echo $Err; ?></span>
                        <span class="text-danger"><?php echo $succ; ?></span>
                    </div>
                    <div class="col-lg-8 m-auto">
                        <form class="form-contact contact_form" enctype="multipart/form-data" method="post" >
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type='text' class="form-control w-100" name="name" id="name" required="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'" placeholder=" Enter Name">
										<span class="text-danger"><?php echo $nameErr; ?></span>
										  <span id="errmsg"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="mobno" id="mobno"  maxlength="10" minlength="10" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your Mobile No'" placeholder="Enter your Mobile No">
										<span class="text-danger"><?php echo $mobilenoErr; ?></span>
                    <span id="errmsg"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" required="" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
										<span class="text-danger"><?php echo $emailErr;?></span>
                                    </div>
                                </div>
								
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="comp" id="comp" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Company'" placeholder="Company">
                                    </div>
                                </div>
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="designation" id="designation" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Designation'" placeholder="Designation">
                                    </div>
                                </div>
								
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="exp" id="exp" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter experience'" placeholder="Experience(in years)*">
                                    </div>
                                </div>
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="salary" id="salary" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter salary'" placeholder="current/last Annual salary(INR)*">
                                    </div>
                                </div>
								
								<div class="col-12">
                                    <div class="form-group">
                                        Upload Resume:<input class="form-control" type="file" name="file" id="file">
                                    </div>
                                </div>
                                 
                            </div>
                            <div class="form-group mt-3">
                                <input type="submit" name="btn" value="send"  class="button button-contactForm boxed-btn">
                            </div>
                        </form>
                    </div>
                  
                </div>
            </div>
        </section>
 

   <footer>
      <!-- Footer Start-->
      <div class="footer-area footer-padding">
          <div class="container">
              <div class="row d-flex justify-content-between">
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                     <div class="single-footer-caption mb-50">
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
                             <div class="footer-social">
								 <a href="#"><i class="fab fa-facebook-square"></i></a>
								 <a href="#"><i class="fab fa-twitter-square"></i></a>
								 <a href="#"><i class="fab fa-linkedin"></i></a>
								 <a href="#"><i class="fab fa-pinterest-square"></i></a>
							 </div>
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
							   <h4><b>Corporate office<b></h4>
                               <ul>
                                <li><a href="#">9312972456,
	                                            9899408786
                                          </a></li>
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
        <!-- Date Picker -->
        <script src="./assets/js/gijgo.min.js"></script>
		<!-- One Page, Animated-HeadLin -->
      <script src="./assets/js/wow.min.js"></script>
		<script src="./assets/js/animated.headline.js"></script>
      <script src="./assets/js/jquery.magnific-popup.js"></script>

		<!-- Scrollup, nice-select, sticky -->
      <script src="./assets/js/jquery.scrollUp.min.js"></script>
      <script src="./assets/js/jquery.nice-select.min.js"></script>
		<script src="./assets/js/jquery.sticky.js"></script>
        
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
  $("#mobno").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut(4000);
               return false;
    }
   });

 $("#name").keypress(function(event){
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