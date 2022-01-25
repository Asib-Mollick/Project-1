<?php
require_once "db.php";


$id = $_GET["id"];

$query = " SELECT * FROM userdata WHERE id= $id";

$result = mysqli_query($conntion, $query);

if (mysqli_num_rows($result)) {
    $data = mysqli_fetch_assoc($result);
}

// Update 
$error = [];
if (isset($_POST['submit'])) {
    $name = trim(htmlentities($_POST['first_name']));
    $uname = trim(htmlentities($_POST['user_name']));
    $email = trim(htmlentities($_POST['email']));
    $phone = trim(htmlentities($_POST['phone']));
    $photo = $_FILES['photo'];

    if (empty($error)) {

        if ($photo['name']) {
            $img_ext = explode('.',$photo['name']);
            $photo_name =$name. '-'.time() . '.' . end($img_ext);
            $photoname = trim($photo_name);
            $upload = move_uploaded_file($photo['tmp_name'],"upload/profile/".$photoname);
  
            $filepath = "upload/profile/".$data['photo'];
    
            if (file_exists($filepath)) {
                unlink($filepath) ;
            }   
            else {
                echo " image not Found ";
            }
                $query = " UPDATE userdata SET name='$name',uname='$uname',email='$email', phone = '$phone', photo='$photoname' WHERE id = $id "; 
                $send = mysqli_query($conntion,  $query);   
    }

     else {
        $query = " UPDATE userdata SET name='$name',uname='$uname',email='$email', phone = '$phone' WHERE id = $id "; 

        $send = mysqli_query($conntion,  $query);            
     } 
         if ($send) {
            $done =  " Update successfully ";        
         }         
 }              
}          
  



include "inc/header.php";
?>



<div class="container " style="margin-top: 20px;">
<form action="" method="POST" enctype="multipart/form-data">
    
        <?php
          if (isset($done)) {
         ?>
          <div class="alert alert-success">
            <p> <?php echo $done; ?>  </p>
          </div>
         <?php   
          }
        ?>
<div class="card-header" style="text-align: center;">
    <h2>User Info</h2>
</div>

    <div class="row g-0 ">
  <div class="col-sm-6 col-md-8 card-body ">
      <table class="table table-bordered">
      <thead class="thead-dark">
         
          <tr>
              <th>Name</th>
              <td> <input type="text" class="form-control" name="first_name" value="<?= $data['name'] ?>" ></td>
          </tr>

          <tr>
              <th>User Name</th>
              <td> <input type="text" class="form-control" name="user_name" value="<?= $data['uname'] ?>" > </td>
          </tr>

          <tr>
              <th>Email</th>
              <td> <input type="email" class="form-control" name="email" value="<?= $data['email'] ?>" ></td>
          </tr>
          <tr>
              <th>Phone</th>
              <td> <input type="text" class="form-control" name="phone" value="<?= $data['phone'] ?>" ></td>
          </tr>
      </thead>
      </table>
      
</div>

<div class="col-6 col-md-3"> 
        <div class="text-center" style="padding-top: 60px;">
        <img src="upload/profile/<?=$data['photo']?>"   width="180"alt="<?= $data['name'] ?>">
        <div class="form-group" style="margin-top: 10px;"> 
         <input type="file"   name="photo" >
         </div>
        </div>
        <div class="form-group">
        <input type="submit" class="btn btn-success btn-block"  name="submit" value="Update"> 
        </div>     
    </div>
     
</div>

</form>
          
    

</div>



  





<?php
include "inc/footer.php"
?>



