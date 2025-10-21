<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Now | Restaurant Delight</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Place Your Order</h1>
    <nav>
      <a href="index.html">Home</a>
      <a href="menu.php">Menu</a>
      <a href="order.php">Order</a>
    </nav>
  </header>

  <section class="form-section">
    <form action="add_order.php" method="POST">
      <label for="name">Customer Name:</label>
      <input type="text" id="name" name="customer_name" required>

      <label for="phone">Phone:</label>
      <input type="text" id="phone" name="phone" required>

      <label for="item">Select Item:</label>
      <select id="item" name="food_item" required>
        <?php
        include 'db.php';
        $sql = "SELECT name FROM menu_items";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['name']}'>{$row['name']}</option>";
          }
        } else {
          echo "<option>No menu items available</option>";
        }
        $conn->close();
        ?>
      </select>

      <label for="quantity">Quantity:</label>
      <input type="number" id="quantity" name="quantity" min="1" value="1" required>

      <label for="address">Delivery Address:</label>
      <textarea id="address" name="address" rows="3" placeholder="Enter delivery address"></textarea>

      <button type="submit">Submit Order</button>
    </form>
  </section>
</body>
</html>