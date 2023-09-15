<?php include_once "header.php"; ?>
<main>
    <section>
    <a href="logout.php">Logout</a>
    </section>
    <section>
    <!-- main content here -->
    <?php 
     session_start();
     
    if($_SESSION['user_name']==null)
    {
    }
    else
    {
       $user_name=$_SESSION['user_name'];
       echo "<h2> Welcome ". $user_name."</h2>";
    }



    ?>
    <img src="pc.jpg" alt="DP" width="500" height="250">
</section>
</main>
<?php include_once "footer.php"; ?>
</body>
</html>
