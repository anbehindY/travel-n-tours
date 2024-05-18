<?php

session_start();

include("connection.php");
global $connection;

if (isset($_POST['login'])) {

// code...

    $email = $_POST['email'];

    $password = $_POST['password'];


    $query = "select * from admin where email='$email' and password='$password'";

    $result = mysqli_query($connection, $query);

    $count = mysqli_num_rows($result);


    if ($count > 0) {

// code...

        $arr = mysqli_fetch_array($result);

        $user_id = $arr['id'];

        $username = $arr['name'];


        $_SESSION['user_id'] = $user_id;

        $_SESSION['username'] = $username;

        echo "<script>window.alert('login success.')</script>";

        echo "<script>window.location='dashboard.php'</script>";

    } else {

        echo "<script>window.alert('login fail.')</script>";

        echo "<script>window.location='login-form.php'</script>";

    }

}

?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Admin login</title>
</head>

<body>


<!-- admin login from -->

<form method="post">

    <h2>Admin login</h2>

    <br>


    <label for="email">Email

    <input type="text" name="email" placeholder="enter email" required></label>

    <br><br>


    <label for="password">Password

    <input type="password" name="password" placeholder="enter password" required></label>

    <br><br>


    <input type="submit" name="login" value="LOGIN">

</form>

</body>

</html>