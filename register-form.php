<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration form</title>
</head>
<body>
<h1>Registration form</h1>
<form action="register.php" method="post">
    <label for="username">Username</label>
    <input type="text" name="username" id="username">
    <br>
    <label for="phoneNumber">Phone Number</label>
    <input type="text" name="phoneNumber" id="phoneNumber">
    <br>
    <label for="address">Address</label>
    <textarea rows="4" cols="50" name="address" id="address"></textarea>
    <br>
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    <br>
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <br>
    <label for="confirm_password">Confirm Password</label>
    <input type="password" name="confirm_password" id="confirm_password">
    <br>
    <input type="submit" value="Register" name="register">
</body>
</html>