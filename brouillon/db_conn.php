<?php
$servername = "185.98.131.176";
$username = "badog2121822";
$password = "wtahkoomqr";
$dbname = "badog2121822";

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "documentation";

$conn=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password); 



// $conn = mysqli_connect($servername, $username, $password, $dbname);

// if (!$conn) {
//     die("Connection failed" . mysqli_connect_error());
// }

?>