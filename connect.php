<?php

$db=new mysqli('localhost','root','','items');

if(!$db){
    die(mysqli_error($db));
}
?>

