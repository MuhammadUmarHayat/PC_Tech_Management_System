<?php include '../config.php';
session_start();// start the session
$username=   $_SESSION['username'];
$result = $con->query("SELECT * FROM `carts`");
?>

<?php
include("header.php");
include("nav.php");
?>
<section >


    <h2 style="text-align:center">Item list</h2>
    <form action="mycart.php">
<table border=1>
    <tr>
        <th>ID</th>
        <th>Customer</th>
        <th>Product</th>
        <th>Product Number</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th></th>
        <th></th>
    </tr>
  <?php  if ($result && $result->num_rows > 0) 
  {
     while ($row = $result->fetch_assoc())
    {
        //`customer`, `productId`, `price`, `qty`, `total`
    ?>

<tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['customer'] ?></td>
        <td><?php echo $row['product_name'] ?></td>
        <td><?php echo $row['product_number'] ?></td>
        <td><?php echo $row['price'] ?></td>
        <td><?php echo $row['quantity'] ?></td>
        <td><?php echo $row['total'] ?></td>
        <td><?php echo '<a  text-decoration: none;"  href="editCart.php?id=' . $row['id'] . '">Edit Quantity</a>';?></td>
         <td><?php echo '<a text-decoration: none;"  href="removeCart.php?id=' . $row['id'] . '">Remove Details</a>';?></td>
         
    </tr>

<?php
      }
    }
                        ?>
                        </table>
</form>
</body>
</html>





 