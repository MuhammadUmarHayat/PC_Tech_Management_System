<!DOCTYPE html>
<html>
<head>
    <title>Long Search Bar with Signup/Login and Cart</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="header">
    
        <div class="search-bar">
        <form action="index.php" method="post">
            <input type="text" name="title" placeholder="Search...">
            <button type="submit" name="search">Search</button>
        </form>
        
        </div>
        <div class="user-actions">
            <a href="checkout.php">Checkout</a>
           
            <a href="mycart.php" class="cart-icon">&#128722;</a>
        </div>
        
    </div>
</body>
</html>
