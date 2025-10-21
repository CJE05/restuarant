<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['customer_name'];
  $food = $_POST['food_item'];
  $qty = $_POST['quantity'];

  $sql = "INSERT INTO orders (customer_name, food_item, quantity)
          VALUES ('$name', '$food', '$qty')";

  if ($conn->query($sql) === TRUE) {
    echo "<h2>Order placed successfully!</h2>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>