<?php include '../config.php';
 
$id= $_GET['id'];


$insert = $con->query("DELETE FROM `product_stocks` WHERE `id`='$id'"); 
             if($insert)
             { 
               
                header('Location:http://localhost/pctechms/admin/products.php');

            }else{ 
                header('Location:http://localhost/pctechms/admin/products.php');
            }  

?>