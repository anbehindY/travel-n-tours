<?php

session_start();

session_destroy();

echo "<script>window.alert('logout')</script>";

echo "<script> window.location ='index.php' </script>";

?>