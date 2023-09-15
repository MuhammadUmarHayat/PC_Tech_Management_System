<?php include '../config.php';
//get data 
$id= $_GET['id'];
$product_name= "";
$product_number= "";
$brand= "";
$category="";
$quantity= "";

$result = $con->query("SELECT * FROM `product_stocks`  where  `id`='$id'"); 
if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
			
      
        $product_name= $row['product_name'] ;
        $product_number=$row['product_number'] ;
       $brand=$row['brand'] ;
        $category= $row['category'] ;
      $quantity= $row['quantity'];
     
		
	   
		
		
		
}
}


 
if(isset($_POST["submit"]))
{

$id= $_GET['id'];
		
	
$product_name= $_POST['product_name'];
$product_number= $_POST['product_number'];
$brand= $_POST['brand'];
$category=$_POST['category'];
$quantity= $_POST['quantity'];
		
	echo $sql="UPDATE `product_stocks` SET `product_name`='$product_name', `product_number`='$product_number',`brand`='$brand',`quantity`='$quantity',`category`='$category' where  `id`='$id'";
		
		
		
		
		
	
	$insert = $con->query($sql); 
             if($insert){ 
                $status = 'success'; 
                echo $statusMsg = "Record is updates successfully."; 
                header('Location:http://localhost/pctechms/admin/products.php');
            }else{ 
               echo $statusMsg = "Failed, please try again."; 
            }  
	
	
	
	
}

// $product_name= $_POST['product_name'];
// $product_number= $_POST['product_number'];
// $brand= $_POST['brand'];
// $category=$_POST['category'];
// $quantity= $_POST['quantity'];



?>
<?php
include("header.php");
include("nav.php");
?>
<form action="editProduct.php?id=<?php echo $id; ?>" method="post">
<table>


<tr><td>Product ID</td><td><?php echo $id; ?></td></tr>
<tr><td>Product Name</td><td><input type="Text" name="product_name" value="<?php echo $product_name; ?>"></td></tr>
<tr><td>Product Number</td><td><input type="Text" name="product_number" value="<?php echo $product_number; ?>"></td></tr></td>
</tr>
<tr><td>Category</td><td><input type="Text" name="category" value="<?php echo $category; ?>"></td></tr>
<tr><td>Quantity</td><td><input type="Text" name="quantity" value="<?php echo $quantity; ?>"></td></tr>
<tr><td></td><td><input class="btn-success" type="submit" name="submit" value="Save Changes"></td></tr>


</table>
</form>