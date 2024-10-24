<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StepIntoStyleForAdmin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
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
            margin: 0;
            padding: 0;
        }

        .pic {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: 20px 0;
        }

        .icon {
            font-size: 180px;
            color: #FFD4E4;
            margin-bottom: 20px;
        }

        .butt {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: 20px 0;
        }

        /* Button styles */
        .btn {
            margin: 10px;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 25px;
            text-transform: uppercase;
            text-decoration: none;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            position: relative;
            z-index: 1;
        }

        .btn:before {
            content: '';
            position: absolute;
            top: 2px;
            left: 2px;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 25px;
            z-index: -1;
            filter: blur(10px);
            transform: scale(1.05);
        }

        .btn {
            margin: 10px;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 25px;
            text-transform: uppercase;
            text-decoration: none;
            position: relative;
            overflow: hidden;
            /* Prevents the pseudo-element from overflowing */
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        /* Pseudo-element for the background */
        .btn:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.2);
            /* Light highlight */
            border-radius: 25px;
            transition: transform 0.3s ease;
            /* Smooth transition */
            z-index: 0;
            /* Behind the button text */
        }

        /* Shadow effect */
        .btn {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            /* Adding shadow */
        }

        .btn:hover {
            transform: translateY(-3px);
            /* Lift the button */
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            /* Darker shadow on hover */
        }

        /* Specific button color styles */
        .b1 {
            background-color: #6c757d;
            color: #fff;
        }

        .b1:hover {
            background-color: #5a6268;
        }

        .b2 {
            background-color: #007bff;
            color: #fff;
        }

        .b2:hover {
            background-color: #0056b3;
        }

        .b3 {
            background-color: #B9103B;
            color: #fff;
        }

        .b3:hover {
            background-color: #c82333;
        }



        /* Card styles for buttons */
        .button-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.2s;
            margin-bottom: 15px;
        }

        .button-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="lobster-regular">StepIntoStyle</div>
    </div>
    <div class="pic">
        <i class="icon bi bi-person-badge-fill"></i>
        <h3>Welcome, Admin <?php echo $_SESSION['username']; ?></h3>
    </div>
    <div class="butt">
        <div class="button-card">
            <a href="addProduct.php" class="btn b1" style="color: white; text-decoration: none;">Add Product</a>
            <a href="editProduct.php" class="btn b2" style="color: white; text-decoration: none;">Edit Product</a>
        </div>
        <a href="logout.php" class="btn b3 btn-outline-danger" style="color: white; text-decoration: none;">Logout</a>
    </div>
</body>

</html>