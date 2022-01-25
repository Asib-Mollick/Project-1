<?php
session_start();


?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Registration Form | Asib Mollick </title>
    <link rel="stylesheet" href="style/regi.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>

   

  <div class="container">
    <?php
          if (isset($_SESSION['success'])) {
      ?>
          <div class="alert alert-success">
            <h2 style="text-align: center; color:green; " > <?php echo $_SESSION['success']; ?>  </h2>
          </div>
      <?php   
          }
      ?>
    
  
    <div class="title">Registration</div>
    <div class="content">
      <form action="regiaction.php" method="POST" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" name="first_name">
                <?php 
                     if (isset($_SESSION['nameerror'])) {
                      echo "<p style='color:red';>" . $_SESSION['nameerror'] . "</p>";
                    }                              
                ?>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter your username" name="user_name">
            <?php 
                     if (isset($_SESSION ['uname2'])) {
                      echo "<p style='color:red';>" . $_SESSION ['uname2'] . "</p>";
                    }                              
                ?>
                <?php 
                     if (isset($_SESSION['unameerror'])) {
                      echo "<p style='color:red';>" . $_SESSION['unameerror'] . "</p>";
                    }                              
                ?>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="email">
            <?php 
                     if (isset($_SESSION['email2'])) {
                      echo "<p style='color:red';>" . $_SESSION['email2'] . "</p>";
                    }                              
                ?>
            <?php 
                     if (isset($_SESSION['emailerror'])) {
                      echo "<p style='color:red';>" . $_SESSION['emailerror'] . "</p>";
                    }                              
                ?>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" name="phone">
            <?php 
                     if (isset($_SESSION['phoneerror'])) {
                      echo "<p style='color:red';>" . $_SESSION['phoneerror'] . "</p>";
                    }                              
                ?>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="Password" placeholder="Enter your password" name="password">
            <?php 
                     if (isset($_SESSION['passerror'])) {
                      echo "<p style='color:red';>" . $_SESSION['passerror'] . "</p>";
                    }                              
                ?>
                 <?php 
                     if (isset($_SESSION['password8'])) {
                      echo "<p style='color:red';>" . $_SESSION['password8'] . "</p>";
                    }                              
                ?>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="Password" placeholder="Confirm your password" name="cpassword">
            <?php 
                     if (isset($_SESSION['cpasserror'])) {
                      echo "<p style='color:red';>" . $_SESSION['cpasserror'] . "</p>";
                    }                              
                ?>
          </div>
          <div class="input-box">
          <span class="details">Upload Your Profile Picture</span>
            <input class="form-control" style="padding: 8px;" type="file" id="formFile" name="photo">
            <?php 
                     if (isset($errorformet)) {
                      echo "<p style='color:red';>" . $errorformet . "</p>";
					 }
           ?>
        </div>
    </div>
        

        <div class="button" style="margin: 15px 0px ;">
          <input type="submit" name="submit" value="Register">
        </div>
        <div class="signup-link " style="text-align: center; " >Already have an account?  <a href="index.php" style="text-decoration: none;">Login now</a></div>
      </form>
    </div>
  </div>

</body>
</html>

<?php

session_unset();

?>