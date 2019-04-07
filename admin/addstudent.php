<?php
session_start();
        
        if($_SESSION['uid']){
            echo "";
        }
        else{
            header('location: ../login.php');
        }
?>
<?php
include('header.php');
include('titlehead.php')
?>
<form method="post" action="addstudent.php" enctype="multipart/form-data">
<table align ="center">
    <tr>
    <th>Roll NO</th>
        <td><input type="text" name="rollno" placeholder="Enter Roll no." required></td>
    </tr>
    
    <tr>
    <th>Full Name</th>
        <td><input type="text" name="name" placeholder="Enter Full Name" required></td>
    </tr>
    
    <tr>
    <th>City</th>
        <td><input type="text" name="city" placeholder="Enter City" required></td>
    </tr>
    
    <tr>
    <th>Parents Contact No</th>
        <td><input type="text" name="pcon" placeholder="Enter Parents Contact No" required></td>
    </tr>
    
    <tr>
    <th>Standard</th>
        <td><input type="number" name="std" placeholder="Enter Standard" required></td>
    </tr>
    
    <tr>
    <th>Image</th>
        <td><input type="file" name="simg" required></td>
    </tr>
    
    <tr align="center">
    <td colspan="2"><input type="submit" name="submit" value="Submit"></td>
    </tr>
    </table>
</form>
</body>
</html>

<?php
    if(isset($_POST['submit'])){
        
        include('../dbcon.php');
        $rolno=$_POST['rollno'];
        $name=$_POST['name'];
        $city=$_POST['city'];
        $pcon=$_POST['pcon'];
        $std=$_POST['std'];
        $imagename=$_FILES['simg']['name'];
        $tempname=$_FILES['simg']['tmp_name'];
        
        move_uploaded_file($tempname,"../dataimg/$imagename");
        
        $qry="INSERT INTO `student`(`rollno`, `name`, `city`, `pcont`, `standard`,`image`) VALUES ('$rolno','$name','$city','$pcon','$std','$imagename')";
        $run= mysqli_query($con,$qry);
        
        if($run==true){
            ?>
  <script>
alert('Data Inserted Successfully');
</script>
<?php
        }
    }
    ?>