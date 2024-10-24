<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
        /* Basic styles */
        body {
            padding: 0;
            background-color: #f4f4f4;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        .lobster-regular {
            font-family: "Lobster", sans-serif;
            font-weight: 400;
            font-style: normal;
            font-size: 50px;
            color: #fff;
        }

        /* Header styles */
        .header {
            background-color: #FDDDE6;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 50px;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="lobster-regular">StepIntoStyle</div>
    </div>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "12345678";
    $dbname = "mydb";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_errno());
    }
    $sql = "SELECT * FROM products 
        WHERE prodID = " . $_POST["product_id"] . " ";
    $objQuery = mysqli_query($conn, $sql);
    $objResult = mysqli_fetch_array($objQuery);
    if ($objResult) {
        echo "ProductID already exist. ";
    } else {
        $sql = "INSERT INTO products (prodID, prodName, brandID, price, prodImage)
    VALUES ('" . $_POST["product_id"] . "','" . $_POST["price"] . "','" .
            $_POST["brand_id"] . "','" . $_POST["image"] . ") ";
        if (mysqli_query($conn, $sql)) {
            echo "New Product created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
    ?>
</body>

</html>