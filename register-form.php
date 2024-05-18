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
    <input type="text" name="username" id="username" required>
    <br>
    <label for="phoneNumber">Phone Number</label>
    <input type="text" name="phoneNumber" id="phoneNumber" required>
    <br>
    <label for="address">Address</label>
    <textarea rows="4" cols="50" name="address" id="address" required></textarea>
    <br>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>
    <br>
    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>
    <input type="checkbox" name="show" onclick="showPassword()">show password
    <br>
    <label for="confirm_password">Confirm Password</label>
    <input type="password" name="confirm_password" id="confirm_password" required>
    <input type="checkbox" name="show" onclick="showConfirmPassword()">show password
    <br>
    <?php
    if (isset($_GET['error'])) {
        echo "<small style='color: red'>" . $_GET['error'] . "</small>";
    }
    ?>
    <input type="submit" value="REGISTER" name="register">
</form>
    <script type="text/javascript">
        function showPassword() {
            const x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        function showConfirmPassword() {
            const x = document.getElementById("confirm_password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>
</html>