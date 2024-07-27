<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cosmetics";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $mobile = trim($_POST["mobile"]);
    $address = trim($_POST["address"]);
    $payment_mode = trim($_POST["payment_mode"]);
    $product_name = trim($_POST["product_name"]);
    $price = trim($_POST["price"]);

    // Debugging: Print received values
    echo "Received values: <br>";
    echo "Name: $name<br>";
    echo "Email: $email<br>";
    echo "Mobile: $mobile<br>";
    echo "Address: $address<br>";
    echo "Payment Mode: $payment_mode<br>";
    echo "Product Name: $product_name<br>";
    echo "Price: $price<br>";

    if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($mobile) || empty($address) || empty($payment_mode) || empty($product_name) || empty($price)) {
        echo "Please fill in all fields correctly.";
    } else {
        $stmt = $conn->prepare("INSERT INTO buy (name, email, mobile, address, payment_mode, product_name, price) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssd", $name, $email, $mobile, $address, $payment_mode, $product_name, $price);

        if ($stmt->execute()) {
            echo "Thank you for your purchase!";
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();
    }
}

$conn->close();
?>
