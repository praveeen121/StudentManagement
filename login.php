<?php
session_start();
if($_SESSION['uid']){
    //header('location:admin/admindash.php');
}
?>
<! DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    </head>
    <body>
    <h1 align="center">Admin login</h1>
        <form action="login.php" method="post">
            
        <table align="center">
            <tr>
            <td>Username</td><td><input type="text" name="uname" required></td>
            </tr>
            <tr>
            <td>Password</td><td><input type="password" name="pass"></td>
            </tr>
            <tr>
            <td colspan="2" align="center"><input type="submit" name="login" value="login"> </td>
            </tr>
            </table>
            
        </form>
    </body>
</html>
<?php
include('dbcon.php');
if(isset($_POST['login'])){
    $username=$_POST['uname'];
    $password=$_POST['pass'];
    
    $qry = "SELECT * FROM admin WHERE username ='".$username."' AND password='".$password."' LIMIT 1";
    $run=mysqli_query($con,$qry);
    $row= mysqli_num_rows($run);
    if($row <1){
        ?>
     <script>
   alert('username or password not matched!!');
   window.open('login.php','_self');
         
   </script>
 <?php
    }
    else{
        $data=mysqli_fetch_assoc($run);
        $id=$data['id'];
        echo "id=".$id;
        
        
        $_SESSION['uid']=$id;
        header('location:admin/admindash.php');
    }
}
?>