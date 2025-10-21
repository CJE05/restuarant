<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu | Restaurant Delight</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Our Menu</h1>
    <nav>
      <a href="index.html">Home</a>
      <a href="menu.html">Menu</a>
      <a href="order.html">Order</a>
    </nav>
  </header>

  <section class="menu">
    <?php
    include 'db.php';
    $sql = "SELECT * FROM menu_items";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "
        <div class='menu-item'>
          <h3>{$row['name']}</h3>
          <p>{$row['description']}</p>
          <p class='price'>₹{$row['price']}</p>
        </div>";
      }
    } else {
      echo "<p>No menu items available.</p>";
    }

    $conn->close();
    ?>
  </section>
</body>
</html>