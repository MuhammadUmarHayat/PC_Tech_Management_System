
<?php include_once "header.php"; ?>

    <section>
    <?php //include_once "searchbar.php"; 
    include 'config.php';
    $result;
    if(isset($_POST['search']))
{
  echo "clicked";
    $title=$_POST['title'];
    $category=$_POST['title'];
    
  $query ="SELECT * FROM `product_stocks` where `product_name`='$title' or `category`='$category'or `brand`='$title'";
 
    $result =$con->query($query);
    if(!$result)
    {
      echo "No record is found";
    }
   
}
else{
     $result = $con->query("SELECT * FROM `product_stocks`");
}
    ?>
    </section>

    
    <!-- main content here -->

<style>
    .md{
        height:90%;
        padding-left: 10px;     
    }
    .div1 {
    background: #800080;
    width: 350px;
    float:left;
    display: inline-block;
    height:100%;
    color: #ffccff;
   padding: 10px;
    
  }
  .div2 {
    display: inline-block;
    float:left;
    padding: 1rem 1rem;
    height:100%;
    /* vertical-align: middle; */
  }
    </style>
 
   
  <div class='md'>
  <div class="search-bar" style="background-color:#a32638; margin:10px; padding:5px;">
        <form action="index.php" method="post">
            <input type="text" name="title" id="title" placeholder="Search...">
            <button type="submit" name="search">Search</button>
            <a href="signup.php">Signup</a>
            <a href="login.php">Login</a>
            <a href="index.php" class="cart-icon">&#128722;</a>
        </form>
           
        </div> 
        <br> 
  <div class='div1'>
  <p>  Laptop(100)</p>
          <p> Dell(200) </p>
          <p> HP(50)</p>
          <p>  Cases(10)</p>

  </div>
  <div class='div2'>
    
  <?php  if ($result->num_rows > 0) 
  {
     while ($row = $result->fetch_assoc())
    {
       
    ?>
    <div class="card" style="float:left; margin-left: 30px;">
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

</div>

</div>
    
<main>
 
</main>


   

<?php include_once "footer.php"; ?>
</body>
</html>
