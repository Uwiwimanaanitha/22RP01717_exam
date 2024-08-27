<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ADD NEW EMPLOYEE</h1>
    <form action="" method="post">
        <label for="employee_name">Employee Name</label>
        <input type="text" name="employee_name" id="employee_name"><br>
        <label for="email">Email</label>
        <input type="text" name="email" id="email"><br>
        <label for="phone">Phone</label>
        <input type="number" name="phone" id="phone"><br>
        <label for="position">Position</label>
        <input type="text" name="position" id="position"><br>
        <label for="address">Address</label>
        <input type="text" name="address" id="address"><br>
        <input type="submit" name="submit" value="Add"><br>
    </form>
</body>
</html>
<?php
include_once("connection.php");

if(isset($_POST["submit"])){
    $employee_name = $_POST['employee_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $position = $_POST['position'];
    $address = $_POST['address'];

    if(empty($employee_name)){
        echo "<span>Employee name is required</span><br>";
    }

    if(empty($email)){
        echo "<span>Email is required</span><br>";
    }

    if(empty($phone)){
        echo "<span>Phone is required</span><br>";
    }

    if(empty($position)){
        echo "<span>Position is required</span><br>";
    }

    if(empty($address)){
        echo "<span>Address is required</span><br>";
    }

    if(!preg_match("/^[a-zA-Z ]*$/", $employee_name)){
        echo "<span>Only letters are allowed in employee name</span><br>";
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "<span>Invalid email format</span><br>";
    }

    if(!preg_match("/^[0-9]*$/", $phone)){
        echo "<span>Only numbers are allowed in phone</span><br>";
    }

    if(!preg_match("/^[a-zA-Z ]*$/", $position)){
        echo "<span>Only letters are allowed in position</span><br>";
    }

    if(!preg_match("/^[a-zA-Z0-9 ]*$/", $address)){
        echo "<span>Only letters, numbers, and spaces are allowed in address</span><br>";
    }

    if(
        !empty($employee_name) &&
        !empty($email) &&
        !empty($phone) &&
        !empty($position) &&
        !empty($address) &&
        preg_match("/^[a-zA-Z ]*$/", $employee_name) &&
        filter_var($email, FILTER_VALIDATE_EMAIL) &&
        preg_match("/^[0-9]*$/", $phone) &&
        preg_match("/^[a-zA-Z ]*$/", $position) &&
        preg_match("/^[a-zA-Z0-9 ]*$/", $address)
    ){
        $query = mysqli_query($conn, "INSERT INTO employees(employee_name, email, phone, position, address) VALUES('$employee_name', '$email', '$phone', '$position', '$address')");

        if($query){
            header("location:view.php");
            exit();
        } else {
            echo "<span>Data not inserted</span><br>";
        }
    }
}
?>
