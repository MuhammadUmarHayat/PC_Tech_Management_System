<?php include 'config.php'; 
$query="SELECT * FROM users";
if(isset($_POST['dsc']))
{
    $query="SELECT * FROM users ORDER BY `user_name` DESC";//Descending order

} 

if(isset($_POST['asc']))
{
    $query="SELECT * FROM users ORDER BY `user_name` ASC"; //Ascending order 
} 
$result = $con->query($query);

    ?>

<!-- user list Interface GUI -->



<?php include_once "header.php"; ?>
<main>
    <section>
    <?php include_once "nav.php"; ?>
    </section>
    <section>
    <!-- main content here -->
    <form method="post" action="user_list.php">
        <table>
            <tr>
            <td><button type="submit" name="asc"> Sort by Ascending order</button> </td>  
            <td><button type="submit" name="dsc"> Sort by Descending order </button> </td>  
            </tr>
</table>
    <table border=1>
        <tr><th>Full Name</th><th>User Name</th><th>City</th><th>Email</th><th>Mobile</th></tr>

        <?php if($result->num_rows > 0)
        { 
            while($row = $result->fetch_assoc())
            { 
                ?> 
        <tr>
            <td><?php echo $row['full_name']?></td>
            <td><?php echo $row['user_name']?></td>
            <td><?php echo $row['city']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['mobile']?></td>
        </tr>
        <?php 
            }
     } ?> 
    </table>

    
</section>
</main>
<?php include_once "footer.php"; ?>
</body>
</html>
