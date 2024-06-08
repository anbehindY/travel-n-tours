<?php

include( "connection.php" );
global $connection;
session_start();
$pid1 = $_GET['pID'];

$showquery = "select * from pitch where id=$pid1";

$result = mysqli_query( $connection, $showquery );

$arr           = mysqli_fetch_array( $result );
$pitch_type_id = $arr['pitch_type_id'];

$p1 = $arr['photoOne'];
$p2 = $arr['photoTwo'];

$p3 = $arr['photoThree'];
if ( isset( $_POST['btnSubmit'] ) ) {

	$pName = $_POST['txtpName'];

	$map     = $_POST['txtmap'];
	$address = $_POST['txtAddress'];

	$fees = $_POST['txtFees'];

	$local = $_POST['txtlocal'];

	$pt = $_POST['cobPT'];

	$pID = $_POST['pID'];

	$folder = "assets/";

// photo1 upload

	if ( $_FILES['photo1']['name'] != "" ) {
		$filePhoto1 = $_FILES['photo1']['name'];
		$fileName1  = $folder . '_' . $filePhoto1;
		$copy1      = copy( $_FILES['photo1']['tmp_name'], $fileName1 );
		if ( ! $copy1 ) {
			echo "<p>Camping photo cannot upload";
			exit();
		}
	} else {
		$fileName1 = $p1;
	}
	var_dump( $fileName1 );


	if ( $_FILES['photo2']['name'] != "" ) {
		$filePhoto2 = $_FILES['photo2']['name'];
		$fileName2  = $folder . '_' . $filePhoto2;
		$copy2      = copy( $_FILES['photo2']['tmp_name'], $fileName2 );
		if ( ! $copy2 ) {
			echo "<p>Camping photo cannot upload";
			exit();
		}
	} else {
		$fileName2 = $p2;
	}

	if ( $_FILES['photo3']['name'] != "" ) {
		$filePhoto3 = $_FILES['photo3']['name'];
		$fileName3  = $folder . '_' . $filePhoto3;
		$copy3      = copy( $_FILES['photo3']['tmp_name'], $fileName3 );
		if ( ! $copy3 ) {
			echo "<p>Camping photo cannot upload";
			exit();
		}
	} else {
		$fileName3 = $p3;
	}

// photo2 upload
//
//	$filePhoto2 = $_FILES['photo2']['name'];
//
//	$fileName2 = $folder . '_' . $filePhoto2;
//
//	$copy2 = copy( $_FILES['photo2']['tmp_name'], $fileName2 );
//
//	if ( ! $copy2 ) {
//
//		echo "<p>Camping photo cannot upload";
//
//		exit();
//
//	}
//
//// photo3 upload
//
//	$filePhoto3 = $_FILES['photo3']['name'];
//
//	$fileName3 = $folder . '_' . $filePhoto3;
//
//	$copy3 = copy( $_FILES['photo3']['tmp_name'], $fileName3 );
//
//	if ( ! $copy3 ) {
//
//		echo "<p>Camping photo cannot upload";
//
//		exit();
//
//	}

	$UpdatePitch = " 

    UPDATE pitch  

    SET  

        name = '$pName', 

        map = '$map', 

        address = '$address', 

        photoOne = '$fileName1', 

        photoTwo = '$fileName2', 

        photoThree = '$fileName3', 

        fees = '$fees', 

        localAttractions = '$local', 

        pitch_type_id = '$pt' 

    WHERE  

        id = '$pID'";

	$updateResult = mysqli_query( $connection, $UpdatePitch );

	if ( $updateResult ) {

		echo "<script>window.alert(' Data update successful!')</script>";

		echo "<script>window.location='pitch.php'</script>";

	} else {

		echo "<script>window.alert(' Data Update unsuccessful!')</script>";

		echo "<script>window.location='pitch.php'</script>";

	}

}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Pitch Update</title>

    <link rel="stylesheet" href="">

</head>

<body>


<a href="pitch.php">Back</a>


<form method="post" enctype="multipart/form-data">

    <h1>Pitch Update Entry form:</h1>


    <table cellspacing="5px" cellpadding="5px">

        <tr>

            <td>Pitch Name</td>

            <td><input type="text" name="txtpName" value="<?php echo $arr['name'] ?>"></td>

        </tr>

        <tr>

            <td>Map</td>

            <td>

                <textarea name="txtmap"><?php echo $arr['map']; ?></textarea>

            </td>

        </tr>

        <tr>

            <td>Address</td>

            <td>

                <textarea name="txtAddress"><?php echo $arr['address'] ?></textarea>

            </td>

        </tr>

        <tr>

            <td>Photo 1</td>

            <td>

                <input type="file" name="photo1" accept="img/*" onchange="loadFile1(event)"/>

                <div><img id="output1" width="200" src="<?php echo $p1 ?>"/></div>

                <script>

                    var loadFile1 = function (event) {

                        var image = document.getElementById('output1');

                        image.src = URL.createObjectURL(event.target.files[0]);

                    };

                </script>

            </td>

        </tr>

        <tr>

            <td>Photo 2</td>

            <td>

                <input type="file" name="photo2" accept="img/*" onchange="loadFile2(event)"
                       value="<?php echo $p2 ?>">

                <p><img id="output2" width="200" src="<?php echo $p2 ?>"/></p>

                <script>

                    var loadFile2 = function (event) {

                        var image = document.getElementById('output2');

                        image.src = URL.createObjectURL(event.target.files[0]);

                    };

                </script>

            </td>

        </tr>

        <tr>

            <td>Photo 3</td>

            <td><input type="file" name="photo3" accept="img/*" onchange="loadFile3(event)"
                       value="<?php echo $p3 ?>">

                <p><img id="output3" width="200" src="<?php echo $p3 ?>"/></p>

                <script>

                    var loadFile3 = function (event) {

                        var image = document.getElementById('output3');

                        image.src = URL.createObjectURL(event.target.files[0]);

                    };

                </script>

            </td>

        </tr>

        <tr>

            <td>fees</td>

            <td><input type="text" name="txtFees" value="<?php echo $arr['fees'] ?>"></td>

        </tr>

        <tr>

            <td>Local Attraction</td>

            <td>

                <input type="text" name="txtlocal" value="<?php echo $arr['localAttractions'] ?>">

            </td>

        </tr>

        <tr>

            <td>Pitch Type</td>

            <td>

				<?php
				$ptshow   = "select * from pitch_type where id=$pitch_type_id";
				$ptData   = mysqli_query( $connection, $ptshow );
				$ptresult = mysqli_fetch_array( $ptData );

				if ( $ptresult != null ) {
					$ptName = $ptresult['name'];
				}
				?>

                <select name="cobPT">

                    <option value="<?php echo $arr['pitch_type_id'] ?>"> <?php echo $ptName; ?></option>

					<?php

					$pt = "select * from pitch_type ";

					$result = mysqli_query( $connection, $pt );

					$count = mysqli_num_rows( $result );
					for ( $i = 0; $i < $count; $i ++ ) {
						$arr1   = mysqli_fetch_array( $result );
						$ptName = $arr1['name'];
						$ptId   = $arr1['id'];
						echo "<option value='$ptId'> $ptName </option> 

";
					}
					?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <input type="hidden" name="pID" value="<?php echo $arr['id'] ?>">
                <input type="submit" name="btnSubmit" value="Update">
                <input type="reset" name="btnClear" value="Clear">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
