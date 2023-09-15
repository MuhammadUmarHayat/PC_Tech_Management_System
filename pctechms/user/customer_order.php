<?php include '../config.php';
session_start();
?>
<?php 

	$customerID="";
$amount=0;
$customerID=$_SESSION["username"] ;

	
 
$result = mysqli_query($con, 'SELECT SUM(`total`) AS value_sum FROM carts'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
$amount=$sum ;


if(isset($_POST['done']))
{
if(!empty($_POST)) 
{
	
	// echo "$fname Refsnes.<br>";
 	try 
	{ 
       //empty the cart when order is places
 
			
          $cusID = $customerID;
           
			 $status = "paid";
			 $bankname= $_POST['bankname'];
			          $accountNumber= $_POST['accountNumber'];
					  
		$method="";		
		$orderid=rand(111,999);
		$_SESSION["orderid"]=$orderid;	
		$quantity;  
				
	 if(isset($_POST['methods']))
{
	$method=$_POST['methods'];
	
	//save order////////////////
	
	


$result = $con->query("SELECT * FROM `carts` WHERE customer='$customerID'"); 
 if($result->num_rows > 0)
 { 

 while($row = $result->fetch_assoc())
 {
	
	 
	// $row['id']."-".$row['customer']."-".$row['product_number']."-".$row['price']."-".$row['quantity']."-".$row['total']."<br>";
	
	$cusId=$row['customer'];
	
	$productid=$row['product_number'];
	$price=$row['price'];
	$quantity=$row['quantity'];
	$status="paid";
	$total=$row['total'];
	
	$date=date("Y/m/d");
    //put orders into thetable
    $q1="INSERT INTO `order_table`(`id`, `customer`, `productid`, `qty`, `price`, `total`, `order_date`, `status`) VALUES ('$orderid','$cusID','$productid','$quantity','$price','$total','$date','$status')";

			 $query = mysqli_query($con,$q1);	


$result1 = $con->query("SELECT * FROM  `product_stocks` WHERE `product_number`='$productid'"); 
 if($result1->num_rows > 0)
 { 

 while($row1 = $result1->fetch_assoc())
 {
$title=$row1['product_name'];
$productid12=$row1['id'];

$status="sold";
$date=date("Y/m/d");
echo"<hr>";
echo "sale";
// put data into sale table
echo $q12="INSERT INTO `sale_table`(`productid`, `product`, `qty`, `sale_date`) VALUES ('$productid','$title','$quantity','$date')";
 echo $query12 = mysqli_query($con,$q12);	

 
 }
 }



	
 }//end loop
 
 
 
 
 
 
 }
 else
 {
	 
	 
	  echo "No orders are found!";
 }

	
	
	
	
	
	
	$q2="DELETE FROM `carts`";//remove data from cart table
			 $query = mysqli_query($con,$q2);	

 
}
else{
	
	
	echo "please select payment method first";
}
	
	
			$query="";
		//$bankname= $_POST['bankname'];
		//$accountNumber= $_POST['accountNumber'];	
			$accountTitle=$bankname;
			$accountNo=$accountNumber;
			$csv="";
			$remaks="paid";
			$createdat=date("Y-m-d");
			
				                                                                                    //INSERT INTO `customer_payments`(`customerid`, `orderid`, `orderdate`, `amount`, `method`, `accountTitle`, `accountNo`, `csv`, `remarks`, `createdat`) 
			// $q1="INSERT INTO `customer_payments`(`customerid`, `orderid`, `orderdate`, `amount`, `method`, `accountTitle`, `accountNo`, `csv`, `remarks`, `createdat`)  VALUES ('$cusID', '$orderid`,'$createdat', '$amount','$method','$accountTitle','$accountNo','$csv','$remaks','$createdat')";
			// " result".$query = mysqli_query($con,$q1);	
			//getData($customerID) ;
			$_SESSION["orderid"]=$orderid;
			header('Location:http://localhost/pctechms/user/generate_receipet.php');
				echo 'Thank you for payment!';
				
				
		
			
	}
	
	
 catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
 
		
	}
	

else
{
	
	
	
	echo "Please fill the form first";
}
}



include("header.php");

include("nav.php");
echo "<h2> Customer name : ".$customerID."</h2>";
?>
<div >

<form method="POST" action="customer_order.php">

  
<table>

<input type="radio" name="methods"
<?php if (isset($methods) && $methods=="cod") echo "checked";?>
value="cod">Cash on Delivery<br>
<input type="radio" name="methods"
<?php if (isset($methods) && $methods=="crd") echo "checked";?> value="crd">Online Transaction via Credit Card<br>
<input type="radio" name="methods"
<?php if (isset($methods) && $methods=="online") echo "checked";?> value="online">Online Transaction via Bank<br>
<br>









<tr><td> Enter cusID:</td><td> <?php  echo $customerID; //$amount?></td></tr>

<tr><td> Enter  Bank Name/ Credit Card Name:</td><td> <input type="text" name="bankname"></td></tr>		

 <tr><td> Enter  Account Number/CSV Code :</td><td> <input type="text" name="accountNumber"></td></tr>

 
<tr><td> Enter  payment amount:</td><td> <?php  echo $amount;?></td></tr>

<tr><td> </td><td> <button type="submit" name="done" >Submit</button></td></tr>			


    
    </table>
</form>
</div>
</div>
</main>
</div>
</body>
</html>