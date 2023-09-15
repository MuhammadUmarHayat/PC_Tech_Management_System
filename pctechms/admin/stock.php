<?php include '../config.php';
// remaining quantity in the stock 

$remainingStockQuery="SELECT ps.product_name, ps.product_number, ps.brand, (ps.quantity - COALESCE(sales.qty, 0)) AS remaining_quantity FROM product_stocks ps LEFT JOIN (SELECT productid, SUM(qty) AS qty FROM sale_table GROUP BY productid) AS sales ON ps.product_number = sales.productid";



$result = $con->query($remainingStockQuery);

?>

<?php include_once "header.php";
include_once "nav.php";
 ?>
 <section >


    <h2 style="text-align:center">Product Remaining Quantity</h2>
<table border=1>
    <tr>
        <th>Product Name</th>
        <th>Product Number</th>
        <th>Brand</th>
        <th>Remaining Quantity</th>
        
        
        
    </tr>
  <?php  if ($result->num_rows > 0) 
  {
     while ($row = $result->fetch_assoc())
    {
        //`product_name`, `product_number`, `brand`, `category`, `quantity`, `status`
    ?>

<tr>
       
        <td><?php echo $row['product_name'] ?></td>
       
        
        <td><?php echo $row['product_number'] ?></td>
        <td><?php echo $row['brand'] ?></td>
       
        <td><?php echo $row['remaining_quantity'] ?></td>
        
       
      
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