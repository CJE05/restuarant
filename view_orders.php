<?php
include 'db.php';

$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

echo "<h2>All Orders</h2>";
echo "<table border='1' cellpadding='8'>
<tr>
<th>ID</th>
<th>Customer Name</th>
<th>Food Item</th>
<th>Quantity</th>
<th>Address</th>
<th>Action</th>
</tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>".$row["id"]."</td>
            <td>".$row["customer_name"]."</td>
            <td>".$row["food_item"]."</td>
            <td>".$row["quantity"]."</td>
            <td>".$row["address"]."</td>
            <td>
                <a href='update_order.php?id=".$row["id"]."'>Edit</a> |
                <a href='delete_order.php?id=".$row["id"]."'>Delete</a>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No orders yet.</td></tr>";
}
echo "</table>";

$conn->close();
?>