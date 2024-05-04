<?php
include 'connection.php';
global $connection;

if ($_POST['register'] == 'Register') {
    $username = $_POST['username'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password != $confirm_password) {
        echo "Passwords do not match";
        exit();
    }

    $query = "INSERT INTO admin (name, address, email, phone, password) VALUES ('$username','$address', '$email', '$phoneNumber', '$password')";

    if (mysqli_query($connection, $query)) {
        echo "User registered successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
}
