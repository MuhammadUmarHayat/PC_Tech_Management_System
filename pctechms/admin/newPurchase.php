<?php
include '../config.php';
$message = "";
?>



<?php


if (isset($_POST['submit'])) {
    

    if (!empty($_FILES["image"]["name"]))
     {
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

//`product_stocks`(`product_name`, `product_number`, `brand`, `category`, `quantity`, `status`, `dateInStock
           $product_name = $_POST['product_name'];
           $product_number=$_POST['product_number'];
             $brand =$_POST['brand'];
           $category=$_POST['category'];//purchasing_date
          $quantity=$_POST['quantity'];
          $dateInStock=$_POST['purchasing_date'];
          $purchase=$_POST['purchase'];
          $sale=$_POST['sale'];

          $description=$_POST['description'];
          $specifications=$_POST['specifications'];
         
            $status="ok";
            

//INSERT INTO `product_stocks`(`product_name`, `product_number`, `brand`, `category`, `quantity`, `status`, `dateInStock`,  `photo`) VALUES ('','','','','','','','','')

            $query = "INSERT INTO `product_stocks`(`product_name`, `product_number`, `brand`,`description`, `specifications`, `category`, `quantity`, `status`, `dateInStock`,  `photo`,`purchase`,`sale`) VALUES ('$product_name','$product_number','$brand','$description','$specifications','$category','$quantity','$status','$dateInStock','$imgContent','$purchase','$sale')";

            $insert = mysqli_query($con, $query);



          
            header('Location:http://localhost/pctechms/admin/products.php');
        }
    }
}



  include("header.php");
?>


<form method="post" action="newPurchase.php" enctype="multipart/form-data">
                    <div class="center">
                        <table>

                            <tr>
                                <td>Product Name </td>
                                <td><input type="text" name="product_name" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Product Number </td>
                                <td><input type="text" name="product_number" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Brand </td>
                                <td><input type="text" name="brand" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Category </td>
                                <td>
    <select name="category">
    <option disabled selected>-- Select Category--</option>
    <?php
	//mysqli_query($con,$q1);
    include '../config.php';  // Using database connection file here
        $records = mysqli_query($con, "SELECT category From product_stocks");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['category'] ."'>" .$data['category'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
 
                            </td>
                            </tr>

                            <tr>
                                <td>Description </td>
                                <td><textarea id="description" name="description" rows="4" cols="50"></textarea> <span class="error">*</span> </td>
                            </tr>
                           

                            <tr>
                                <td>Specificatios </td>
                                <td><textarea id="specifications" name="specifications" rows="4" cols="50"> </textarea><span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Quantity </td>
                                <td><input type="text" name="quantity" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Select product photo:</label>
                                </td>
                                <td> <input type="file" name="image">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Purchasing Price </td>
                                <td><input type="number" name="purchase" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Salling Price </td>
                                <td><input type="number" name="sale" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Date of purchasing </td>
                                <td><input type="date" name="purchasing_date" required> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> <button type="submit" name="submit"> Submit </button> </td>
                            </tr>
                        </table>
                        <?php
                        echo $message;
                        ?>
                    </div>
                </form>


</body>
</html>
