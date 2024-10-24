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
        }

        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            background: linear-gradient(145deg, #ffffff, #f0f0f0);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-container input, .form-container select {
            width: 100%;
            padding: 15px;
            margin: 12px 0;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: inset 3px 3px 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
        }

        .form-container input:focus, .form-container select:focus {
            border-color: #FFBBDF;
            outline: none;
            box-shadow: 0 0 10px rgba(255, 187, 223, 0.5), inset 0 0 5px rgba(255, 187, 223, 0.3);
        }

        .form-container button {
            width: 100%;
            padding: 15px;
            background: linear-gradient(145deg, #FE74B4, #EB3C7C);
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s;
        }

        .form-container button:hover {
            background: linear-gradient(145deg, #EB3C7C, #FE74B4);
            box-shadow: 0 15px 20px rgba(0, 0, 0, 0.3);
            transform: translateY(-3px);
        }

        .form-container button:active {
            transform: translateY(1px);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="lobster-regular">StepIntoStyle</div>
    </div>
    <div class="form-container">
        <h2>Add Product</h2>
        <form id="add-product-form" action="addCart.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="product_id" class="form-control" placeholder="Product ID" required>
            <input type="text" name="name" class="form-control" placeholder="Product Name" required>
            <input type="text" name="brand_id" class="form-control" placeholder="Brand Name" required>
            <input type="number" name="price" class="form-control" placeholder="Price" required>
            <input type="file" name="image" class="form-control" accept="image/*" required>
            <button type="submit" class="btn">Add Product</button>
        </form>
    </div>
</body>
</html>
