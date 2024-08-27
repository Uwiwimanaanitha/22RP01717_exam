<?php
session_start();
if(!isset($_SESSION['username'])){
header("location:login.php");
}
?>
<?php
include_once("connection.php");
$id = $_GET['id'];

$q=mysqli_query($conn,"SELECT * FROM employees WHERE id='$id'");

if(mysqli_num_rows($q)>0){

$query = mysqli_query($conn,"DELETE FROM employees WHERE id ='$id'");

if($query){

    header("location:view.php");
}
else{
    echo"not found";
}

}
else{


    echo"<span> no employee found</span>";
}



?>
