<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title></title>
	</head>
	<body>
		<h1>Connecting to DBMS...</h1>

<?php
$servername = "localhost";
$username = "toni_loja";
$password = "yseyYaQzNbbMVRSL";
$database = "loja";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully <br/> <br/> ";

$id = $_GET["id"];

// if (!preg_match('/^\d{1,8}$/',$id)) {
//   echo "Invalid ID. Try again! <br/> ";
//   exit;
// }

// ' or '1' = '1
$sql = "SELECT * FROM products WHERE id=? and name=?";

$result = $conn->prepare($sql);
$result-> bind_param("i", $id);
$result-> execute();

if ($result) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<br> id: ". $row["id"]. " - Name: ". $row["name"]. " - qtd: " . $row["qtd"] . " - price: " . $row["price"] . "<br>";
     }
} else {
     echo "0 results";
}

mysqli_close($conn);
?>


	</body>
</html>
