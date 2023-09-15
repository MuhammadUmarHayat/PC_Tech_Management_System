<?php include '../config.php';?>

<?php
session_start();
$username=   $_SESSION['username'];
$product_name="";
    $product_number="";
    $brand="";
    $description="";
    $category="";
    $specifications="";
    $photo;
	
if(isset($_POST['checkout']))
{
	header('Location:http://localhost/pctechms/user/checkout.php');
}



 $productid=$_GET['id'];

$_SESSION["productid"] =$productid;
$productid=$_SESSION["productid"];

if(isset($_POST['add']))//add to cart
{
	
    $cusId = $username;
    $productid=$_POST['id'];
    
$result = $con->query("SELECT * FROM product_stocks where id= '$productid'"); 

if($result->num_rows > 0)
{

$row = $result->fetch_assoc();

$price = $row['sale'];

$product_name = $row['product_name'];
$product_number = $row['product_number'];

    
$qty=1;		
$TotalPrice=$price*$qty;

$q1="INSERT INTO `carts`( `product_name`, `product_number`, `quantity`, `price`, `total`, `customer`) VALUES ('$product_name','$product_number','$qty','$price','$TotalPrice','$cusId')";
  
$query = mysqli_query($con,$q1);

//go to mycart the page
header('Location:http://localhost/pctechms/user/mycart.php');
}



	
	
	
	
	
}



$result = $con->query("SELECT * FROM product_stocks where id= '$productid'"); 

 if($result->num_rows > 0)
 {
	$row = $result->fetch_assoc();
	
	
    include("header.php");
    include("nav.php");
    $customerID=$username;
echo "<h2> Welcome : ".$customerID."</h2>";
?>

<h2> View Product Information</h2>
   <form method="POST" action="ProductDetails.php">
   <?php 
   
   $product_name=$row['product_name'];
	 $product_number=$row['product_number'];
	 $brand=$row['brand'];
     $description=$row['description'];
     $category=$row['category'];
     $specifications=$row['specifications'];
     $photo=$row['photo'];

     

 }
   ?>


<div class="card">
<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>" width=50px; height=50px; />
  <h2><?php echo $row['product_name'] ?></h2>
  <p class="price"><?php echo $row['sale'] ?></p>
  <p><?php echo $row['description'] ?></p>
  <p><input type="hidden" id="id" name="id" value="<?php echo $row['id']?>"></p>
  



<p>
	   <select name ="qty" id="qty">  
  <option value="Select" >--Select--</option> 
  <option value="1">1</option>  
  <option value="2">2</option>  
  <option value="3">3</option>  
  <option value="4">4</option>  
  <option value="5">5</option>  
  <option value="6">6</option>  
  <option value="7">7</option>  
  <option value="8">8</option>  
  <option value="9">9</option>  
  <option value="10">10</option>
  <option value="9">11</option>  
  <option value="10">12</option>
</select></p>
<p><input type="hidden" id="id" name="id" value="<?php echo $row['id']?>"></p>

<p><button type="submit" name="add" >Add to Cart </button></p>


</div>

 	 


                    
                </form>
            </div>
        </div>


        

    </main>
</div>
</body>
</html>