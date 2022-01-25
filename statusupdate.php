<?php
require_once "db.php";


$id = $_GET["id"];

$query = " SELECT status FROM userdata WHERE id= $id";

$result = mysqli_query($conntion, $query);

if (mysqli_num_rows($result)) {
    $data = mysqli_fetch_assoc($result);
}

if ($data['status'] == 1 ) {
    $query = " UPDATE userdata SET status='0' WHERE id = $id "; 
    $send = mysqli_query($conntion,  $query);      
}
else{
    $query = " UPDATE userdata SET status='1' WHERE id = $id "; 
    $send = mysqli_query($conntion,  $query);
}

header("Location: status.php");

?>