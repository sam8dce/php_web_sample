<?php 

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
          $name = input_data($_POST["name"]);  
            // check if name only contains letters and whitespace  
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
                $nameErr = "Only alphabets and white space are allowed";  
            }  
    }  

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


}else{}
?>