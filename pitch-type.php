<?php
include 'connection.php';
include 'navigation.php';
global $connection;

session_start();
if (!isset($_SESSION['user_id'])) {

    // code...

    echo "<script>window.alert('Please login.') </script>";

    echo "<script>window.location= 'login-form.php' </script>";

}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pitch_type = $_POST['pitch_type'];
    $check_pitch_name = "SELECT * FROM PITCH_TYPE WHERE name = '$pitch_type'";
    $result = mysqli_query($connection, $check_pitch_name);
    $count = mysqli_num_rows($result);

    if($count > 0){
        echo "<script>window.alert('Pitch type already exists.')</script>";
        echo "<script>window.location='pitch-type.php'</script>;";
    }
    $query = "INSERT INTO PITCH_TYPE (name) VALUES ('$pitch_type')";

    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "<script>window.alert('Pitch type added successfully.')</script>";
    } else {
        echo "<script>window.alert('Failed to add pitch type.')</script>";
    }
    echo "<script>window.location='pitch-type.php'</script>;";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pitch type</title>
</head>
<body>
    <section class="flex flex-col px-8 py-6 gap-4">
        <h1 class="text-red-800 text-3xl font-bold">
            Pitch type entry
        </h1>
            <form method="post">
               <div class="flex gap-5 items-center">
                   <label for="pitch_type" class="text-gray-800 text-lg font-medium whitespace-nowrap">Name of Pitch type</label>
                   <input type="text" name="pitch_type" id="pitch_type" class="w-full py-2 px-4 rounded-lg border border-gray-300 mt-2">
                   <button type="submit" class="bg-red-800 text-white py-2 px-4 rounded-lg mt-2">Submit</button>
               </div>
            </form>
    </section>
</body>
</html>