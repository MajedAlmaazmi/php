<?php
/*Database connection start*/
$servername = "localhost:5901";
$username = "root";
$password = "Siaapp@2022";
$dbname = "siagov_sia";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>
