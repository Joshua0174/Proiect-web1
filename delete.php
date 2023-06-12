<?php
require_once('connect.php');
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="delete from `items` where id=$id";
    $result=mysqli_query($db,$sql);
    if($result){
        //echo "Deleted successfully!";
        header('location:pagina1.php');
    }else{
        die(mysqli_error($db));
    }
}


?>
