<?php

include "connection.php";
global $connection;
session_start();

if ( isset ( $_POST['btnSave'] ) ) {

	$pName = $_POST['txtPName'];

	$map = $_POST['txtMap'];

	$address = $_POST['txtAddress'];

	$fees = $_POST['txtFees'];

	$local = $_POST['txtLocal'];

	$cobpt = $_POST['cobPT'];


// photo1 upload

	$filePhoto = $_FILES['txtPhoto1']['name'];

	$folder = "assets/";

	$fileName = $folder . '_' . $filePhoto;

	$copy = copy( $_FILES['txtPhoto1']['tmp_name'], $fileName );


	if ( ! $copy ) {

		echo "<p>Camping photo cannot upload";

		exit();

	}


// photo2 upload

	$filePhoto2 = $_FILES['txtPhoto2']['name'];

	$folder2 = "assets/";

	$fileName2 = $folder2 . '_' . $filePhoto2;

	$copy2 = copy( $_FILES['txtPhoto2']['tmp_name'], $fileName2 );


	if ( ! $copy2 ) {

// code...

		echo "<p>Camping photo cannot upload";

		exit();

	}


// photo3 upload

	$filePhoto3 = $_FILES['txtPhoto3']['name'];

	$folder3 = "assets/";

	$fileName3 = $folder3 . '_' . $filePhoto3;

	$copy3 = copy( $_FILES['txtPhoto3']['tmp_name'], $fileName3 );


	if ( ! $copy3 ) {

// code...

		echo "<p>Camping photo cannot upload";

		exit();

	}

// data insert

	$query = "insert into pitch (name,map,address,fees, photoOne,photoTwo,photoThree,localAttractions,pitch_type_id) 

values  

('$pName','$map','$address','$fees','$fileName','$fileName2','$fileName3','$local','$cobpt')";

	$result = mysqli_query( $connection, $query );

	if ( $result ) {

		echo "<script>window.alert(' Data insert successful!')</script>";

		echo "<script>window.location='pitch.php'</script>";

	} else {

		echo "<script>window.alert(' Data insert unsuccessful!')</script>";

	}

}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pitch</title>
    <style>
        th,
        td {
            border: 1px solid rgb(160 160 160);
            padding: 8px 10px;
        }
    </style>
</head>

<body>

<?php

include( "navigation.php" );

?>

<section class="flex flex-col items-center px-8 py-6 gap-4">
    <h1 class="text-red-800 text-3xl font-bold mb-6">
        Pitch Entry
    </h1>
    <form action="pitch.php" method="post" enctype="multipart/form-data"
          class="flex flex-wrap justify-center items-center gap-4">
        <div class="flex flex-col items-start">
            <label class="text-gray-800 text-lg font-medium whitespace-nowrap w-32" for="txtPName">Pitch Name</label>
            <input class="w-[500px] py-2 px-4 rounded-lg border border-gray-300 mt-2" type="text" name="txtPName"
                   placeholder="Enter pitch name" id="txtPName">
        </div>

        <div class="flex flex-col items-start">
            <label class="text-gray-800 text-lg font-medium whitespace-nowrap w-32" for="txtMap">Map</label>
            <input class="w-[500px] py-2 px-4 rounded-lg border border-gray-300 mt-2" type="text" name="txtMap"
                   placeholder="Enter map address" id="txtMap" required>
        </div>

        <div class="flex flex-col items-start">
            <label class="w-32 text-gray-800 text-lg font-medium whitespace-nowrap w-32"
                   for="txtAddress">Address</label>
            <textarea name="txtAddress" placeholder="Enter address" id="txtAddress"
                      class="w-[500px] py-2 px-4 rounded-lg border border-gray-300 mt-2"></textarea>
        </div>

        <div class="flex flex-col items-start">
            <label class="text-gray-800 text-lg font-medium whitespace-nowrap w-32">Photo 1</label>
            <input class="w-[500px] py-2 px-4 rounded-lg border border-gray-300 mt-2" type="file" name="txtPhoto1"
                   required>
        </div>

        <div class="flex flex-col items-start">
            <label class="text-gray-800 text-lg font-medium whitespace-nowrap w-32">Photo 2</label>
            <input class="w-[500px] py-2 px-4 rounded-lg border border-gray-300 mt-2" type="file" name="txtPhoto2"
                   required>
        </div>

        <div class="flex flex-col items-start">
            <label class="text-gray-800 text-lg font-medium whitespace-nowrap w-32">Photo 3</label>
            <input class="w-[500px] py-2 px-4 rounded-lg border border-gray-300 mt-2" type="file" name="txtPhoto3"
                   required>
        </div>

        <div class="flex flex-col items-start">
            <label class="text-gray-800 text-lg font-medium whitespace-nowrap w-32" for="txtFees">Fees</label>

            <input class="py-2 px-4 rounded-lg border border-gray-300 mt-2 w-[500px]" type="text" name="txtFees"
                   placeholder="Enter fees" id="txtFees" required>
        </div>

        <div class="flex flex-col items-start">
            <label class="text-gray-800 text-lg font-medium whitespace-nowrap w-32" for="txtLocal">Local
                Attractions</label>

            <input class="w-[500px] py-2 px-4 rounded-lg border border-gray-300 mt-2" type="text" name="txtLocal"
                   placeholder="Enter local attraction" id="txtLocal" required>
        </div>

        <div class="flex items-center gap-5 w-[1000px] mt-5">
            <label class="text-gray-800 text-lg font-medium whitespace-nowrap" for="cobPT">Pitch Type</label>
            <select name="cobPT" id="cobPT" required class="w-[500px] py-2 px-4 rounded-lg border border-gray-300 mt-2">
                <option value="">Select Pitch Type</option>
				<?php
				$pitch_types = "SELECT * FROM PITCH_TYPE";
				$result      = mysqli_query( $connection, $pitch_types );
				$count       = mysqli_num_rows( $result );

				for ( $i = 0; $i < $count; $i ++ ) {
					$arr    = mysqli_fetch_array( $result );
					$ptName = $arr['name'];
					$ptId   = $arr['id'];
					echo "<option value='$ptId'> $ptName </option> ";
				}
				?>
            </select>

            <input type="submit" name="btnSave" Value='Save' class="bg-red-800 text-white py-2 px-6 rounded-lg mt-2"/>

            <input type="reset" name="btnClear" Value='Clear' class="bg-red-800 text-white py-2 px-6 rounded-lg mt-2"/>
        </div>
    </form>

    <div class="w-4/5 h-[1.5px] bg-slate-700 my-20"></div>

    <h1 class="text-red-800 text-3xl font-bold mb-6">
        Camping List
    </h1>

    <fieldset>

        <form action="pitch.php" method="post">

            <table class="border-2 border-black divide-y divide-black">
                <thead>
                <tr>
                    <th>Pitch ID</th>

                    <th>Name</th>

                    <th>Map</th>

                    <th>Address</th>

                    <th>Photo1</th>

                    <th>Photo 2</th>

                    <th>Photo 3</th>

                    <th>fees</th>

                    <th>Local Attraction</th>

                    <th>Pitch Type</th>

                    <th>Action</th>

                </tr>
                </thead>

				<?php

				$showquery = "select * from pitch";

				$result1 = mysqli_query( $connection, $showquery );

				$count = mysqli_num_rows( $result1 );

				if ( $count > 0 ) {
					for ( $i = 0; $i < $count; $i ++ ) {

						$arr = mysqli_fetch_array( $result1 );

						$pID = $arr['id'];

						$pName = $arr['name'];

						$map = $arr['map'];

						$add = $arr['address'];

						$p1 = $arr['photoOne'];

						$p2 = $arr['photoTwo'];

						$p3 = $arr['photoThree'];

						$fees = $arr['fees'];

						$local = $arr['localAttractions'];

						$ptID = $arr['pitch_type_id'];
						echo "<tr>
                            <td>$pID</td> 
                            <td>$pName</td> 
                            <td>$map</td> 
                            <td>$add</td> 
                            <td><img src='$p1' width='30px' height='30px' alt='pitch_image_1'></td> 
                            <td><img src='$p2'  width='30px' height='30px' alt='pitch_image_2'></td> 
                            <td><img src='$p3'  width='30px' height='30px' alt='pitch_image_3'></td> 
                            <td>$fees</td> 
                            <td>$local</td>
                            <td>$ptID</td> 
                            <td class='w-28'> 
                            <a href='pitch-update.php?pID=$pID' class='hover:text-zinc-900 hover:font-semibold'> Edit </a> | 
                            <a href='pitch-delete.php?pID=$pID' class='hover:text-red-700 hover:font-semibold'> Delete </a> 
                            </td> 
                          </tr>";
					}
				} else {
					echo "<tr><td colspan='11' class='text-center h-20'>No data found</td></tr>";
				}
				?>
        </form>
    </fieldset>
</section>
</body>
</html>







