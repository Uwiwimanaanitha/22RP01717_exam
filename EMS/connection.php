<?php
$conn=mysqli_connect("localhost","root","","nextech_portal_22rp01717") or die(mysqli_error($conn));
if($conn){
   // echo"connected successfully";
}
else{
    echo"connection failed";
}
?>