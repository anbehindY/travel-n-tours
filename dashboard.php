<?php

session_start();

if (!isset($_SESSION['user_id'])) {

    // code...

    echo "<script>window.alert('Please login.') </script>";

    echo "<script>window.location= 'login-form.php' </script>";

}



$id=$_SESSION['user_id'];

$name=$_SESSION['username'];

?>



<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="">

</head>

<body>



<?php

include 'navigation.php';

?>



<h1>Welcome to Admin Dashboard.</h1>



<?php

echo "<p>$id</p><br>";

echo "<p>$name</p>";

?>



</body>

</html>