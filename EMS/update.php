<?php
session_start();
if(!isset($_SESSION['username'])){
header("location:login.php");
}
?>
<?php
include_once("connection.php");
$id = $_GET['id'];

$query  = mysqli_query($conn,"SELECT * FROM employees WHERE id='$id'");
if(mysqli_num_rows($query)>0)
{

    while($row = mysqli_fetch_array($query)){
echo"
<h3>update employee information</h3><br>
<form action='' method='post'>
<label for='employee_name'>employee_name</label>
<input type='text' name='employee_name' value=".$row[1]."><br>
<label >email</label>
<input type='text' name='email' value=".$row[2]."><br>
<label>phone</label>
<input type='nummber' name='phone' value=".$row[3]."><br><br>
<label>position</label>
<input type='text' name='position' value=".$row[4]."><br><br>
<label>address</label>
<input type='text' name='address' value=".$row[5]."><br><br>
<input type='submit' name='submit'  value='save changes'><br>
</form>
";
    }

    if(isset($_POST['submit']))
{

    $employee_name=$_POST['employee_name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $position=$_POST['position'];
    $address=$_POST['address'];

    $update=mysqli_query($conn,"UPDATE employees SET employee_name='$employee_name',email='$email', phone='$phone',position='$position',address='$address' WHERE id='$id'");
  

    if($update){

        header("location:view.php");
    }
    else{

        echo"failed to update data ";
    }





}








}
else{
    echo"<span> no employee found</spane>";
}
?>

