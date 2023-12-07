<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: index.html");
}

// Database connection
$servername = "your_server_name";
$username = "your_username";
$password = "your_password";
$dbname = "inventory";

$conn = new mysqli('localhost', 'root', 'root', 'inventory');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Handle form submission to add a new product
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add"])) {
        $productName = $_POST["product_name"];
        $quantity = $_POST["quantity"];
        $price = intval($_POST["price"]); // Konversi nilai harga ke INT

        // Insert data into the products table
        $sql = "INSERT INTO products (product_name, quantity, price) VALUES ('$productName', $quantity, $price)";

        if ($conn->query($sql) === TRUE) {
            echo "Product added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST["update"])) {
        $productId = $_POST["product_id"];
        $quantity = $_POST["update_quantity"];
        $price = intval($_POST["update_price"]); // Konversi nilai harga ke INT

        // Update data in the products table
        $sql = "UPDATE products SET quantity = $quantity, price = $price WHERE product_id = $productId";

        if ($conn->query($sql) === TRUE) {
            echo "Product updated successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST["delete"])) {
        $productId = $_POST["product_id"];

        // Delete data from the products table
        $sql = "DELETE FROM products WHERE product_id = $productId";

        if ($conn->query($sql) === TRUE) {
            echo "Product deleted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Fetch and display products from the database
$result = $conn->query("SELECT * FROM products");

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <style>
        body {
            background: url('vector-abstract-template-blue-geometric-triangles-contrast-black-background-you-can-use-for-corporate-design-cover-brochure-book-banner-web-advertising-poster-leaflet-flyer.jpg') center/cover fixed no-repeat;
            margin: 0; /* Remove default margin */
            padding: 20px; /* Add padding to the body */
            box-sizing: border-box; /* Include padding in the element's total width and height */
        }

        .ManajemenBarang {
            margin-top: 20px; /* Add margin to the form container */
        }

        form {
            margin-bottom: 20px; /* Add margin to the form to separate it from the table */
        }

        /* Rest of your styles go here */
    </style>
    <title>Inventory Management</title>
</head>
<body>
    <h2>Selamat datang, <?php echo $_SESSION["username"]; ?>!</h2>
    <div class="ManajemenBarang">
        <h2>Manajemen Barang</h2>
        <!-- Form for adding products -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="product_id" class="Id">Product ID:</label>
            <input type="text" name="product_id" required>
            
            <label for="product_name" class="produk">Nama Produk:</label>
            <input type="text" name="product_name" required>

            <label for="quantity" class="Jumlah">Jumlah:</label>
            <input type="number" name="quantity" required>

            <label for="price" class="Harga">Harga:</label>
            <input type="text" name="price" required>

            <button type="submit" name="add">Tambah Produk</button>
        </form>

        <!-- Form for updating and deleting products -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="product_id" class="Id">Product ID:</label>
            <input type="text" name="product_id" required>

            <label for="update_quantity" class="Update">Update Jumlah:</label>
            <input type="number" name="update_quantity" required>

            <label for="update_price" class="Update">Update Harga:</label>
            <input type="text" name="update_price" required>

            <button type="submit" name="update">Update Produk</button>
            <button type="submit" name="delete">Hapus Produk</button>
        </form>
    </div>

    <!-- Display Products Table -->
<div class="product-table">
    <h2>Daftar Produk</h2>
    <table border="1" style="background-color: white; width: 100%;">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["product_id"] . "</td>";
                    echo "<td>" . $row["product_name"] . "</td>";
                    echo "<td>" . $row["quantity"] . "</td>";

                    // Format price with thousands separator
                    $formattedPrice = number_format($row["price"]);
                    echo "<td>" . $formattedPrice . "</td>";

                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No products found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

    <a href="logout.php" class="logout">Logout</a>
    <a href="welcome.php" class="welcome">Kembali ke halaman awal</a>
</body>
</html>

