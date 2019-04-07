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
include('titlehead.php');
include('../dbcon.php');
$sid=$_GET['sid']; 
$sql="SELECT * FROM `student` WHERE `id`='$sid'";
$run=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($run);
 
?>

<form method="post" action="updatedata.php" enctype="multipart/form-data">
<table align ="center">
    <tr>
    <th>Roll NO</th>
        <td><input type="text" name="rollno" value="<?php echo $data['rollno']; ?>" placeholder="Enter Roll no." required></td>
    </tr>
    
    <tr>
    <th>Full Name</th>
        <td><input type="text" name="name" value="<?php echo $data['name']; ?>" placeholder="Enter Full Name" required></td>
    </tr>
    
    <tr>
    <th>City</th>
        <td><input type="text" name="city" value="<?php echo $data['city']; ?>" placeholder="Enter City" required></td>
    </tr>
    
    <tr>
    <th>Parents Contact No</th>
        <td><input type="text" name="pcon" value="<?php echo $data['pcont']; ?>" placeholder="Enter Parents Contact No" required></td>
    </tr>
    
    <tr>
    <th>Standard</th>
        <td><input type="number" name="standard" value="<?php echo $data['standard']; ?>" placeholder="Enter Standard" required></td>
    </tr>
    
    <tr>
    <th>Image</th>
        <td><input type="file" name="simg" required ></td>
    </tr>
    
    <tr align="center">
        
    <td colspan="2" align="center">
        <input type="hidden" name="sid" value="<?php echo $data['id'];?>"/>
        <input type="submit" name="submit" value="Submit"></td>
    </tr>
    </table>
</form>