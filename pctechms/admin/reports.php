<?php include_once "header.php";
include_once "nav.php";
 
 include '../config.php'; 

 

  $countusers="SELECT count(*) AS total_users FROM `users`";
$result = mysqli_query($con, $countusers); 
$row = mysqli_fetch_assoc($result); 
 $total_users=$row['total_users'];


 $countSale="SELECT sum(`quantity`) AS total_Product FROM  `product_stocks`";
 $result = mysqli_query($con, $countSale); 
 $row = mysqli_fetch_assoc($result); 
  $total_Product=$row['total_Product'];



 $countSale="SELECT sum(`qty`) AS total_Product_Sold FROM  `sale_table`";
 $result = mysqli_query($con, $countSale); 
 $row = mysqli_fetch_assoc($result); 
  $total_Product_Sold=$row['total_Product_Sold'];
 
   $countOrders="SELECT count(*) AS total_orders FROM `order_table`";
 $result = mysqli_query($con, $countOrders); 
 $row = mysqli_fetch_assoc($result); 
  $total_orders=$row['total_orders'];
  
  $countIncome="SELECT sum(`total`) AS total_Income FROM `order_table`";
 $result = mysqli_query($con, $countIncome); 
 $row = mysqli_fetch_assoc($result); 
  $total_Income=$row['total_Income'];
  
  ?>
  <center> 
    <h2>Summary </h2>
  <table>
  <tr><td>Total Registered Users</td><td>  <?php echo $total_users; ?></td></tr>
  <tr><td>Total Products </td><td><?php echo $total_Product; ?></td></tr>
  <tr><td>Total Products Sold</td><td><?php echo $total_Product_Sold; ?></td></tr>
  <tr><td>Total Orders</td><td><?php echo $total_orders; ?></td></tr>
  <tr><td>Total Income</td><td><?php echo $total_Income; ?></td></tr>
</table>
</center>
 