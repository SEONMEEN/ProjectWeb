<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "mydb";

// Fetch sizes from the database
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT *FROM sizes INNER JOIN products ON sizes.prodID = products.prodID WHERE sizes"; // Ensure this query is correct for your DB
$result = mysqli_query($conn,$sql);
    echo "<table border=1>";​
    echo "<tr><th>CustomerID</th>";​
    echo "<th>Name</th>";​
    echo "<th>Email</th>";​
    echo "<th>CountryCode</th>";​
    echo "<th>Budget</th>";​
    echo "<th>UsedTotal</th>";​
    echo "</tr>";

if (mysqli_num_rows($result)>0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row["size"]; // Correctly closing the option tag
    }
} else {
    echo "<option disabled>No sizes available</option>";
}
$conn->close();
?>
</select>
