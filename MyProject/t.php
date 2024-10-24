<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "mydb";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
} else {
$sql =
$sql = "SELECT * from sizes inner join products on sizes.prodID = products.prodID WHERE sizes.probID = ";
$result = mysqli_query($conn, $sql);
echo "<table border=1>";
echo "<tr><th>ProductID</th>";
echo "<th>size</th>";
echo "</tr>";
if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) {
echo "<tr><td>".$row["prodID"]. "</td><td>".$row["size"]. "</td></tr>";
}
} else {
echo "0 results";
}}
echo "</table>";
mysqli_close($conn);
?>


