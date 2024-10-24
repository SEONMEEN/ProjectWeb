<html>

<head>
    <title>Edit Product Form</title>
</head>

<body>
    <?php
    ini_set('display_errors', 1);
    error_reporting(~0);

    // ตรวจสอบการรับค่า Product ID จาก URL
    if (isset($_GET["ProbID"])) {
        $prodID = $_GET["ProbID"];
    }

    // การเชื่อมต่อฐานข้อมูล
    $servername = "localhost";
    $username = "root";
    $password = "12345678";
    $dbname = "mydatabase";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // ตรวจสอบการเชื่อมต่อฐานข้อมูล
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query ข้อมูลสินค้าจากตาราง products
    $sql = "SELECT * FROM products WHERE prodID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $prodID);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    // Query ขนาดและจำนวนสินค้าจากตาราง sizes ที่สัมพันธ์กับ prodID
    $sizeSql = "SELECT size, stock FROM sizes WHERE prodID = ?";
    $sizeStmt = $conn->prepare($sizeSql);
    $sizeStmt->bind_param("i", $prodID);
    $sizeStmt->execute();
    $sizeQuery = $sizeStmt->get_result();
    ?>

    <h2>Edit Product Form</h2>
    <form action="ProductEditSave.php" method="post">
        <table width="400" border="1">
            <tr>
                <th width="120">Product ID</th>
                <td width="280">
                    <input type="hidden" name="txtProdID" value="<?php echo $product['prodID']; ?>">
                    <?php echo $product['prodID']; ?>
                </td>
            </tr>
            <tr>
                <th width="120">Product Name</th>
                <td><input type="text" name="txtProdName" size="30" value="<?php echo $product['prodName']; ?>"></td>
            </tr>
            <tr>
                <th width="120">Price</th>
                <td><input type="text" name="txtPrice" size="10" value="<?php echo $product['price']; ?>"></td>
            </tr>
            <tr>
                <th width="120">Available Sizes & Stock</th>
                <td>
                    <?php
                    // วนลูปแสดงขนาดของสินค้าและจำนวนสินค้า (stock) ในรูปแบบ input field
                    while ($size = $sizeQuery->fetch_assoc()) {
                        echo "Size: " . $size['size'] . " - Stock: <input type='text' name='stock[" . $size['size'] . "]' value='" . $size['stock'] . "' size='5'><br>";
                    }
                    ?>
                </td>
            </tr>
        </table>
        <br>
        <input type="submit" name="submit" value="Save Changes">
        <input type="reset" name="reset" value="Cancel">
    </form>

    <?php
    // ปิดการเชื่อมต่อฐานข้อมูล
    mysqli_close($conn);
    ?>
</body>

</html>
