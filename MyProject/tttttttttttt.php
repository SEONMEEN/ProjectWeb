<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'user') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- (Your existing head content) -->
</head>

<body>
    <!-- (Your existing header and navbar content) -->

    <div class="container mt-5">
        <h2 class="mb-4">Product List</h2>
        <div class="row">
            <?php
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "12345678";
            $dbname = "mydb";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch products from the database
            $sql = "SELECT prodID, prodImage, prodName, price FROM products";
            $result = $conn->query($sql);

            // Loop through the products and display them as cards
            if ($result->num_rows > 0) {
                while ($product = $result->fetch_assoc()) {
            ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?php echo $product['prodImage']; ?>" class="card-img-top" alt="<?php echo $product['prodName']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product['prodName']; ?></h5>
                                <p class="card-text">Price: ฿<?php echo number_format($product['price'], 2); ?></p>
                                <a href="#" class="btn btn-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#sizeModal"
                                    data-prod-name="<?php echo $product['prodName']; ?>"
                                    data-price="<?php echo number_format($product['price'], 2); ?>"
                                    data-prod-id="<?php echo $product['prodID']; ?>"> <!-- Updated to include prodID -->
                                    Buy Now
                                </a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>No products found.</p>";
            }
            $conn->close();
            ?>
        </div>
    </div>

    <div class="modal fade" id="sizeModal" tabindex="-1" aria-labelledby="sizeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sizeModalLabel">Select Shoe Size</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="productInfo"></p>
                    <select id="sizeSelect" class="form-select">
                        <option selected disabled>Select size</option>
                        <?php
                        // Fetch sizes from the database using the selected product ID
                        if (isset($_POST['prodID'])) {
                            $productId = $_POST['prodID'];
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Prepare and bind
                            $stmt = $conn->prepare("SELECT size FROM sizes WHERE prodID = ?");
                            $stmt->bind_param("i", $productId);
                            $stmt->execute();
                            $sizeResult = $stmt->get_result();

                            if ($sizeResult->num_rows > 0) {
                                while ($size = $sizeResult->fetch_assoc()) {
                                    echo "<option value='{$size['size']}'>{$size['size']}</option>"; // Correctly closing the option tag
                                }
                            } else {
                                echo "<option disabled>No sizes available</option>";
                            }
                            $stmt->close();
                            $conn->close();
                        }
                        ?>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="confirmPurchase">Confirm Purchase</button>
                </div>
            </div>
        </div>
    </div>

    <!-- (Your existing scripts) -->
    
    <script>
        // Event listener for the Buy Now button to populate modal
        document.addEventListener('DOMContentLoaded', function() {
            const buyNowButtons = document.querySelectorAll('.btn-primary');

            buyNowButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const productName = this.getAttribute('data-prod-name');
                    const productPrice = this.getAttribute('data-price');
                    const productId = this.getAttribute('data-prod-id'); // Get the product ID
                    document.getElementById('productInfo').innerText = `Product: ${productName}, Price: ฿${productPrice}`;

                    // Set the product ID in a hidden field for size selection
                    document.getElementById('sizeSelect').setAttribute('data-prod-id', productId);
                });
            });

            // Event listener for Confirm Purchase button
            document.getElementById('confirmPurchase').addEventListener('click', function() {
                const selectedSize = document.getElementById('sizeSelect').value;
                if (selectedSize) {
                    alert(`You have selected size ${selectedSize}. Thank you for your purchase!`);
                    // You can add your purchase logic here, like sending the order to the server
                } else {
                    alert('Please select a size before confirming your purchase.');
                }
            });
        });
    </script>
</body>

</html>
