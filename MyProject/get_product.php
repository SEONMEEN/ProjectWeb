<!-- get_product.php -->
<?php
    $db = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');
    $prodID = $_GET['prodID'];
    $query = $db->prepare("SELECT id, name, price, image FROM products WHERE id = ?");
    $query->execute([$prodID]);

    $product = $query->fetch(PDO::FETCH_ASSOC);
    echo json_encode($product);
?>
