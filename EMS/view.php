<?php
session_start();
if(!isset($_SESSION['username'])){
header("location:login.php");
}
else{

    $username = $_SESSION['username'];
}
?>
    
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
        a{text-decoration: none;}
       

      
        </style>
    </head>
    <body>
        <?php  echo "welcome ".$username; ?>
        <h1>List of all employees</h1>
    <a href="add.php"><h2>Add new student</h2></a> 
    <a href="logout.php">LOGOUT</a>
    </body>
    </html>
    <?php


    include_once("connection.php");

    $select= mysqli_query($conn,"SELECT * FROM employees");
    $a= mysqli_num_rows($select);
    

    if($a>0){

    echo"<table border='1'>
    <tr>
    <th>id</th>
    <th>employee_name</th>
    <th>email</th>
    <th>phone</th>
    <th>position</th>
    <th>address</th>
    <th>action</th>
    </tr>
    
    "  ;

    while($row = mysqli_fetch_array($select)){
    echo"<tr><td>".$row[0]."</td>";
    echo"<td>".$row[1]."</td>";
    echo"<td>".$row[2]."</td>";
    echo"<td>".$row[3]."</td>";
    echo"<td>".$row[4]."</td>";
    echo"<td>".$row[5]."</td>";
    echo"<td>  &nbsp;&nbsp; <a href='delete.php?id=".$row[0]."'> Delete </a>   &nbsp;&nbsp;&nbsp;&nbsp;  <a href='update.php?id=".$row[0]."'>   update </a>   &nbsp;&nbsp;</td></tr>";




    }






}
    else{

        echo"<spane> No employee found</a>";
    }
    ?>







