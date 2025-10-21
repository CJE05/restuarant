<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $customer_name = $_POST['customer_name'];
        $food_item = $_POST['food_item'];
        $quantity = $_POST['quantity'];
        $address = $_POST['address'];

        $sql = "UPDATE orders SET 
                customer_name='$customer_name',
                food_item='$food_item',
                quantity='$quantity',
                address='$address'
                WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Order updated successfully! <a href='view_orders.php'>Back</a>";
        } else {
            echo "Error updating order: " . $conn->error;
        }
    } else {
        $result = $conn->query("SELECT * FROM orders WHERE id=$id");
        $row = $result->fetch_assoc();
        ?>

        <h2>Update Order</h2>
        <form method="POST">
            Customer Name: <input type="text" name="customer_name" value="<?php echo $row['customer_name']; ?>"><br>
            Food Item: <input type="text" name="food_item" value="<?php echo $row['food_item']; ?>"><br>
            Quantity: <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>"><br>
            Address: <input type="text" name="address" value="<?php echo $row['address']; ?>"><br>
            <input type="submit" value="Update Order">
        </form>

        <?php
    }
}

$conn->close();
?>