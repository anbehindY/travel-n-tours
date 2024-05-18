<?php
include 'connection.php';
global $connection;

if ($_POST['register'] == 'REGISTER') {
    $username = $_POST['username'];
    $address = htmlspecialchars($_POST['address']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phoneNumber = $_POST['phoneNumber'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // check password number,upper,lower, special

    $hasNum = preg_match('@[0-9]@', $password);

    $hasUpperCase = preg_match('@[A-Z]@', $password);

    $hasLowerCase = preg_match('@[a-z]@', $password);

    $hasSpecialChar = preg_match('@[^\w]@', $password);


    // check if email already exists

    $checkEmail = "select * from admin where email='$email'";

    $checkEmailQuery = mysqli_query($connection, $checkEmail);

    $duplicateEmailCount = mysqli_num_rows($checkEmailQuery);


    // check if phone number already exists

    $checkPhoneNum = "select * from admin where phone='$phoneNumber'";

    $checkPhoneNumQuery = mysqli_query($connection, $checkPhoneNum);

    $duplicatePhoneNumCount = mysqli_num_rows($checkPhoneNumQuery);

    $error = "";
    function ErrorResponse($message, $error = "")
    {
        $url = $_SERVER['HTTP_REFERER'];
        $error = urlencode($message);
        header("Location: $url?error=$error");
        exit();
    }

    if ($password != $confirm_password) {
        ErrorResponse("Passwords do not match");
    } elseif ($duplicateEmailCount > 0) {
        ErrorResponse("Email already exists");
    } elseif ($duplicatePhoneNumCount > 0) {
        ErrorResponse("Phone number already exists");
    } elseif (!$hasNum || !$hasUpperCase || !$hasLowerCase || !$hasSpecialChar) {
        ErrorResponse("Password must contain at least one number, one uppercase letter, one lowercase letter and one special character");
    };

    $query = "INSERT INTO admin (name, address, email, phone, password) VALUES ('$username','$address', '$email', '$phoneNumber', '$password')";;
    if (mysqli_query($connection, $query)) {
        echo "User registered successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
}
