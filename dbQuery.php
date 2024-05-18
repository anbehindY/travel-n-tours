<?php
    include 'connection.php';
    global $connection;

    // create pitch table
    $pitchType_query = "CREATE TABLE PITCH_TYPE (
        id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL
    )";

    $query = mysqli_query($connection, $pitchType_query);

    if($query){
        echo "Pitch table created successfully";
    } else {
        echo "Error: " . $pitchType_query . "<br>" . mysqli_error($connection);
    }

$pitch_query = "CREATE TABLE PITCH (
    id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pitch_type_id INT(6) NOT NULL,
    map VARCHAR(255) NOT NULL,
    address VARCHAR(50) NOT NULL,
    fees INT(6) NOT NULL,
    photoOne VARCHAR(255) NOT NULL,
    photoTwo VARCHAR(255) NOT NULL,
    photoThree VARCHAR(255) NOT NULL,
    localAttractions VARCHAR(255) NOT NULL,
    
    FOREIGN KEY (pitch_type_id) REFERENCES PITCH_TYPE(id)
                   
    )";

$query = mysqli_query($connection, $pitch_query);

if($query){
    echo "Pitch table created successfully";
} else {
    echo "Error: " . $pitch_query . "<br>" . mysqli_error($connection);
}