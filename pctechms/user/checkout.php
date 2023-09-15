<?php include '../config.php'; 

session_start();
$customerID="";
$customerID=$_SESSION['username'] ;


if(isset($_POST['order']))
{
	header('Location:http://localhost/pctechms/user/customer_order.php');
}


include("header.php");
include("nav.php");
echo "<h2> Customer Name : ".$customerID."</h2>";
?>
<main>
    <div>
    <form method="POST" action="checkout.php">
				<br>
<br> 
<br>
<table border=1>
<tr><th>ID</th><th>customerID</th><th>Product Number</th><th>unitPrice</th><th>Quantity</th><th>TotalPrice</th></tr>
<?php
// Get image data from database 
$result = $con->query("SELECT * FROM `carts` WHERE customer='$customerID'"); 
 if($result->num_rows > 0)
 { 
 while($row = $result->fetch_assoc()){
  	 
	echo"<tr><td>".$row['id']."</td><td>".$row['customer']."</td><td>".$row['product_number']."</td><td>".$row['price']."</td><td>".$row['quantity']."</td><td>".$row['total']."</td></tr>";
	     
 }
 }
 else{
	 
	 
	  echo "No orders are found!";
 }
 ?>
 </table>
 <?php
 
 //////////////////////////
 $result = mysqli_query($con, 'SELECT SUM(`total`) AS value_sum FROM carts'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
echo "<br> <h2>Total Amount : ".$sum."</h2>";
 ?>
<br>
                    <button type="submit" name="order">Place Order</button>
                </form>
</div>
</main>

