<?php

include( "connection.php" );
global $connection;
session_start();

$ptID = $_GET['pID'];

$deletePitch = "delete from pitch where id=$ptID ";

$result = mysqli_query( $connection, $deletePitch );
if ( $result ) {
	echo "<script>window.alert('Successfully Deleted!')</script>";

	echo "<script>window.location='pitch.php'</script>";

} else {

	echo "<script>window.alert('Something went wrong in Pitch Delete')</script>";

	echo "<script>window.location='pitch.php'</script>";

}

?>