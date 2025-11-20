<div class="page-container">
<?php 
require_once "../_base.php";
require __DIR__."/../template/Card.php";
require __DIR__."/../template/CartItem.php";
$title = "Order Search Results";
include "../_head.php";





// Dummy order data (this replaces the database for now)
$orders = [
    ['order_no' => '1', 'customer' => 'John Tan', 'total' => 120.50, 'status' => 'Completed'],
    ['order_no' => '2', 'customer' => 'Mary Lee', 'total' => 89.90, 'status' => 'Pending'],
    ['order_no' => '3', 'customer' => 'Ahmed Samad', 'total' => 55.00, 'status' => 'Shipped'],
];

// Get the requested order number
$search = isset($_GET['order_no']) ? trim($_GET['order_no']) : '';

$result = null;

if ($search !== '') {
    foreach ($orders as $order) {
        if (strcasecmp($order['order_no'], $search) == 0) {
            $result = $order;
            break;
        }
    }
}
?>

<div class="Content" style="display:flex; flex-direction:column;">

<h2>Search Result</h2>

<?php if ($result): ?>
    <p><strong>Order Number:</strong> <?= $result['order_no'] ?></p>
    <p><strong>Customer:</strong> <?= $result['customer'] ?></p>
    <p><strong>Total:</strong> RM <?= number_format($result['total'], 2) ?></p>
    <p><strong>Status:</strong> <?= $result['status'] ?></p>
<?php else: ?>
    <p>No order found with number <strong><?= htmlspecialchars($search) ?></strong>.</p>
<?php endif; ?>
// If no search input provided
if (!isset($_GET['order_id']) || empty($_GET['order_id'])) {
    echo "<h2></h2><div style='text-align:center;'><h3>No order number entered.</h3></div>";
    exit;
}

$orderID = $_GET['order_id'];

// 1. Get basic order info
$stmt = $pdo->prepare("SELECT * FROM guest_order WHERE order_id = ?");
$stmt->execute([$orderID]);
$order = $stmt->fetch(PDO::FETCH_ASSOC);

// If order not found
if (!$order) {
    echo "<h2></h2><div style='text-align:center;'><h3>Order #$orderID not found.</h3></div>";
    exit;
}

// 2. Get ordered food items
$query = "
    SELECT f.name, f.price, ofd.quantity
    FROM order_food AS ofd
    INNER JOIN food f ON f.food_id = ofd.food_id
    WHERE ofd.order_id = ?
";

$stmt2 = $pdo->prepare($query);
$stmt2->execute([$orderID]);
$items = $stmt2->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="content-wrapper">
    <div style="max-width: 800px; margin: 40px auto; padding: 25px; border-radius: 12px;
                background: #ffffff; box-shadow: 0 4px 15px rgba(0,0,0,0.1); text-align: center;">

        <h2 style="margin-top: 0; font-size: 28px; color: #333;">
            Order Details (#<?php echo $orderID; ?>)
        </h2>

        <p style="font-size: 18px; margin: 10px 0;">
            <strong>Status:</strong> 
            <span style="color: #007bff;"><?php echo $order['status']; ?></span>
        </p>

        <p style="font-size: 18px; margin-bottom: 25px;">
            <strong>Total Price:</strong> 
            <span style="color: #28a745;">RM <?php echo $order['total_price']; ?></span>
        </p>

        <h3 style="margin-bottom: 15px; color: #444;">Ordered Items</h3>

        <?php if (count($items) > 0): ?>
        <table style="width: 100%; border-collapse: collapse; margin-top: 15px; font-size: 16px;">
            <tr style="background: #f8f8f8;">
                <th style="padding: 12px; border-bottom: 2px solid #ddd;">Food</th>
                <th style="padding: 12px; border-bottom: 2px solid #ddd;">Price</th>
                <th style="padding: 12px; border-bottom: 2px solid #ddd;">Quantity</th>
                <th style="padding: 12px; border-bottom: 2px solid #ddd;">Subtotal</th>
            </tr>

            <?php foreach ($items as $item): 
                $subtotal = $item['price'] * $item['quantity'];
            ?>
            <tr>
                <td style="padding:10px; border:1px solid #ccc;"><?php echo $item['name']; ?></td>
                <td style="padding:10px; border:1px solid #ccc;">RM <?php echo number_format($item['price'], 2); ?></td>
                <td style="padding:10px; border:1px solid #ccc;"><?php echo $item['quantity']; ?></td>
                <td style="padding:10px; border:1px solid #ccc;">RM <?php echo number_format($subtotal, 2); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <?php else: ?>
            <p style="margin-top: 20px; color: #777;">No item records found for this order.</p>
        <?php endif; ?>

    </div>
</div>

</div>
<?php include "../_foot.php"?>
<?php include "../_foot.php"; ?>
</div>
