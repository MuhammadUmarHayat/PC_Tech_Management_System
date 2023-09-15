<?php include '../config.php';
// Get image data from database 
$result = $con->query("SELECT * FROM `product_stocks` ");

?>

<?php include_once "header.php";
include_once "nav.php";
 ?>
 <section >
<h3><a style="color:blue;" href="newPurchase.php"> Add new product into stock</a></h3>

    <h2 style="text-align:center">Product List</h2>
<table border=1>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Product Number</th>
        <th>Brand</th>
        <th>Category</th>
        <th>Quantity</th>
        <th>Photo</th>
        <th></th>
        <th></th>
    </tr>
  <?php  if ($result->num_rows > 0) 
  {
     while ($row = $result->fetch_assoc())
    {
        //`product_name`, `product_number`, `brand`, `category`, `quantity`, `status`
    ?>

<tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['product_name'] ?></td>
        <td><?php echo $row['product_number'] ?></td>
        <td><?php echo $row['brand'] ?></td>
        <td><?php echo $row['category'] ?></td>
        <td><?php echo $row['quantity'] ?></td>
        
        <td><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>" width=50px; height=50px; /></td>
        <td><?php echo '<a  text-decoration: none;"  href="editProduct.php?id=' . $row['id'] . '">Edit Details</a>';?></td>
         <td><?php echo '<a text-decoration: none;"  href="deleteProduct.php?id=' . $row['id'] . '">Delete Details</a>';?></td>
   
    </tr>

<?php
      }
    }
                        ?>
                        </table>
</body>
</html>





   
</div>

      </div>
     </section>