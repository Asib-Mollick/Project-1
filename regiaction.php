<?php 
session_start();
require_once  "db.php";
$_SESSION = [];


if (isset($_POST['submit'])) {
   $name = trim(htmlentities($_POST['first_name']));
   $uname = trim(htmlentities($_POST['user_name']));
   $email = trim(htmlentities($_POST['email']));
   $phone = trim(htmlentities($_POST['phone']));
   $pass = $_POST['password'];
   $cpass = $_POST['cpassword'];
   $encPass = md5($cpass);
   $photo = $_FILES['photo'];

   require_once  "db.php";

   $check1 = "SELECT uname FROM userdata WHERE  uname = '$uname' ";
   $result1 = mysqli_query($conntion, $check1);

   if (mysqli_num_rows($result1)) {
    $_SESSION ['uname2'] = "username already Exists";
 
 
      $check2 = "SELECT email FROM userdata WHERE email = '$email' ";
      $result2 = mysqli_query($conntion, $check2);
     if (mysqli_num_rows($result2)) {
           $_SESSION ['email2'] = "Email already Exists";
      }
      
      $passwor = strlen($pass);
      if($passwor < 8 ){  
        $_SESSION ['password8'] = "Your Password less than 8 Character ";
      }
    }
 
    else{
     
   if (empty($name)) {
    $_SESSION ['nameerror'] =  "please enter your name ";
  }   

  if (empty($uname)) {
    $_SESSION ['unameerror'] =  "please enter user name ";
  }   
 
  if (empty($email)) {
    $_SESSION ['emailerror'] =  "please enter a valid email ";
  }   
    
  if (empty($pass)) {
    $_SESSION['passerror'] =  "please enter your Password ";
  }   

  if (empty($cpass)) {
    $_SESSION ['cpasserror'] =  "please enter your Confirm Password  ";

  		}
		  elseif ($pass != $cpass) {
			$passalert = "Confirm password not match! try again!" ;
      
		  }

     


		if (empty($_SESSION)) {
      require  "db.php";
         
           
      $img_ext = explode('.',$photo['name']);
      $photo_name =$name. '-'.time() . '.' . end($img_ext);
      $photoname = trim($photo_name);
        if (end($img_ext) != 'jpg') {
          $errorformet = "please selecte jpg/png/jpge only";
        }
        else {
          $upload = move_uploaded_file($photo['tmp_name'],"upload/profile/".$photoname);
          if ($upload) {
            $query = " INSERT INTO userdata (name, uname, email, phone, password, photo) VALUES ('$name',' $uname','$email', '$phone' ,'$encPass','$photoname') "; 

            $send = mysqli_query($conntion,  $query);
  
           if ($send) {
             $_SESSION['success'] =  " Your registration successful ";
            
           }
          }
        }              
    }
}
}


header("Location: registration.php");









?>