<!-- backend php script -->
<?php include 'config.php'; 
if(isset($_POST['login']))
{
    $user_name = $_POST['user_name'];
	$password = $_POST['password'];
    if($user_name=="admin"&&$password=="admin")
    {
        session_start();//start the session
        $_SESSION['username'] =$user_name;
        header('Location:http://localhost/pctechms/admin/index.php');
    }

    $query="SELECT * FROM  `users` where  `user_name`= '$user_name' and  `password`='$password' ";
	
    $result = mysqli_query($con, $query);
       if ($result->num_rows > 0) 
           {
               session_start();//start the session
               $_SESSION['username'] =$user_name;
               header('Location:http://localhost/pctechms/user/index.php');
       
           }
       else{
       
       echo"Wrong user id or password";
           }

}


?>


<!-- Login Interface GUI -->
<?php include_once "header.php"; ?>
<main>
    <section>
    <?php include_once "nav.php"; ?>
    </section>
    
    <section>
    <form method="post" action="login.php">
<div>
<table>
<tr> <td>

 </td>   </tr>
<tr> <td>User Name <span class="error" >*</span ></td> <td><input type="text" name="user_name" required>    </td>   </tr>
<tr><td>Password <span class="error" >*</span ></td> <td><input type="password" name="password" required> </td>   </tr>

<tr> <td>   </td>
 <td> <button type="submit" name="login"> Login </button>  </td>   </tr>


</table>

</div>
</form>
    </section>
</main>

<?php include_once "footer.php"; ?>
</body>
</html>
