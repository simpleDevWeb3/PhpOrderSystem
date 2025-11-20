<?php 
require_once "../_base.php";
require __DIR__."../../template/Card.php";
require __DIR__."../../template/CartItem.php";
$title = "breverage";
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

<br>
<a href="../index.php">Back to Home</a>

</div>
<?php include "../_foot.php"?>