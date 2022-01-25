<?php
require_once "db.php";

$querya = "SELECT id, name, uname, email, phone, photo, status FROM userdata";

$result = mysqli_query($conntion, $querya);


if (mysqli_num_rows($result)) {
    $datas = mysqli_fetch_all($result, true);
}




include "inc/header.php";


?>
<div class="container" style="margin-top: 20px;">
<div class="card-header" style="text-align: center;">
    <h2>All Users</h2>
</div>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
            <th scope="col">No</th>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">User Name</th>
            <th scope="col">Email</th>
            <th scope="col">phone</th>
            <th scope="col">Photo</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                    foreach ($datas as $key => $data){
                   
                ?>
                    <tr>
                        <td><?= ++$key ?></td>
                        <td><?= $data['id'] ?></td>
                        <td><?= $data['name'] ?></td>
                        <td><?= $data['uname'] ?></td>
                        <td><?= $data['email'] ?></td>
                        <td><?= $data['phone'] ?></td>
                        <td> <img src="upload/profile/<?=$data['photo'] ?>" width="50" alt="<?= $data['name'] ?>"></td>
                        <td >
                            <?php 
                                if ($data['status'] == 1) {
                                   echo "<p style='color:green';>" ."Active" ."</p>";
                                  
                                }
                                else{
                                    echo "<p style='color:red';>" ."Deactive" ."</p>";
                                }
                         ?>
                         </td>

                        
                        <td>
                            <a href="user2.php?id=<?= $data['id'] ?>" class='btn btn-primary btn-sm' role='button'>View</a>
                            <a href="useredit.php?id=<?= $data['id'] ?>" class='btn btn-success btn-sm' role='button'>Edit</a>
                            <a href="delete.php?id=<?= $data['id'] ?>" class='btn btn-danger btn-sm' role='button'> Delete</a>
                        </td>
                    </tr>
                <?php
                     }
                ?>
            </tr>
           
        </tbody>
        </table>
</div>







<?php
include "inc/footer.php"
?>