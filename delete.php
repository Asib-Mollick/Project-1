<?php

require_once "db.php";


$id = $_GET["id"];


$queya = " DELETE FROM userdata WHERE  id = $id ";

mysqli_query($conntion, $queya);

header("Location: allusers.php");

