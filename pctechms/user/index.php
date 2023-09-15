

<?php 


include '../config.php';
session_start();// start the session
$username=   $_SESSION['username'];
$sum=0;
$result;
if(!isset($username))
{
    header('Location:http://localhost/pctechms/logout.php');
}


$customerID=$username;


$customerID=$username;
if(isset($_POST['detail']))
{
  echo  $id=$_POST['id'];
   $_SESSION["productid"]= $id;
   // header('Location:http://localhost/pctechms/user/ProductDetails.php?id='.$id);
}
if(isset($_POST['add']))// add to cart
{
   
    $cusId = $customerID;
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

if(isset($_POST['checkout']))
{
	header('Location:http://localhost/pctechms/user/checkout.php');
}

$_SESSION["cartid"]="";
	$cartID="";
 
	$result = mysqli_query($con, 'SELECT SUM(`total`) AS value_sum FROM `carts`'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
if(empty($sum))
{
$sum=0;
}

 
 
if(isset($_POST['search']))
{
  echo "search";
    $title=$_POST['title'];
    $category=$_POST['title'];
    
  $query ="SELECT * FROM `product_stocks` where `product_name`='$title' or `category`='$category'or `brand`='$title'";
 
    $result =$con->query($query);
    if(!$result)
    {
      echo "No record is found";
    }
   
}
else
{

  $result = $con->query("SELECT * FROM `product_stocks`");

}


?>


<?php include_once "header.php";
include_once "nav.php";
?>

    <section>
    <?php include_once "searchbar.php"; ?>
    </section>
    
    <!-- main content here -->


</div>
    
<main>

<h2 style="text-align:center">Products</h2>
<form action="index.php" method="post">
<?php  if ($result->num_rows > 0) 
  {
     while ($row = $result->fetch_assoc())
    {
        //`product_name`, `product_number`, `brand`, `category`, `quantity`, `status`
    ?>

<div class="card">
<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>" width=50px; height=50px; />
  <h2><?php echo $row['product_name'] ?></h2>
  <p class="price"><?php echo $row['sale'] ?> $</p>
  <p><?php echo $row['description'] ?></p>
  <p><?php echo $row['id'] ?></p>
  <p><input type="hidden" id="id" name="id" value="<?php echo $row['id']?>"></p>
  <p>
    <a class="button" href="ProductDetails.php?id=<?php echo $row['id']; ?>" style="text-decoration: none; background:black;">Add to Cart</a> 
    </p>
    <p>
    <a class="button" href="ProductDetails.php?id=<?php echo $row['id']; ?>" style="text-decoration: none; background:black;">View Details</a> 
    </p>
</div>
<?php
    }
  }
?>
</form>
</main>


   

<?php include_once "footer.php"; ?>
</body>
</html>
