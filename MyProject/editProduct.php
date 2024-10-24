<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StepIntoStyle - Add Product</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        /* Basic styles */
        body {
            padding: 0;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f0f0f0;
        }

        .lobster-regular {
            font-family: "Lobster", sans-serif;
            font-weight: 400;
            font-style: normal;
            font-size: 50px;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        /* Header styles */
        .header {
            background-color: #FDDDE6;
            height: 120px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 50px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        /* Form container */
        .form-container {
            background-color: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 0 auto;
            margin-bottom: 50px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #f7f7f7;
            color: #333;
            font-weight: 600;
        }

        td {
            background-color: #fff;
            transition: transform 0.3s ease;
        }

        tr:hover td {
            transform: scale(1.05);
        }

        /* Button styles */
        /* Button styles */
        a {
            display: inline-block;
            padding: 8px 16px;
            color: #333;
            /* เปลี่ยนสีตัวอักษรเป็นสีเข้มเพื่อให้อ่านง่าย */
            background-color: #FDDDE6;
            /* สีพื้นหลังโทนชมพู */
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        a:hover {
            background-color: #fbc2cf;
            /* สีเมื่อเลื่อนเมาส์ผ่าน (สีเข้มขึ้นเล็กน้อย) */
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
        }


        /* 3D Effects */
        .form-container {
            perspective: 1000px;
        }

        table {
            transform-style: preserve-3d;
        }

        tr:hover td {
            transform: rotateY(10deg);
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="lobster-regular">StepIntoStyle</div>
    </div>
    <div class="form-container">
        <h2>Edit Product</h2>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "12345678";
        $dbname = "mydb";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            $sql = "SELECT * from products";
            $result = mysqli_query($conn, $sql);
            echo "<table>";
            echo "<tr><th>No.</th>";
            echo "<th>Name</th>";
            echo "<th>Action</th>";
            echo "</tr>";
            $i = 1;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>" . $i . "</td><td>" . $row["prodName"] . "</td><td><a href='ProductEditForm.php?ProbID=" . $row["prodID"] . "'>Edit</a> </td></tr>";
                    $i++;
                }
            } else {
                echo "<tr><td colspan='3'>0 results</td></tr>";
            }
        }
        echo "</table>";
        mysqli_close($conn);
        ?>
    </div>
</body>

</html>