<?php include '../config.php';
 
$id= $_GET['id'];


$insert = $con->query("DELETE FROM `carts` WHERE `id`='$id'"); 
             if($insert)
             { 
               
                header('Location:http://localhost/pctechms/user/mycart.php');

            }else{ 
                header('Location:http://localhost/pctechms/user/mycart.php');
            }  

?>