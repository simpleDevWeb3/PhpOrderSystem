<?php
require_once "../_base.php";

// Obtain REQUEST (GET and POST) parameter
function req($key, $value = null) {
    $value = $_REQUEST[$key] ?? $value;
    return is_array($value) ? array_map('trim', $value) : trim($value);
}

session_start();
$user = $_SESSION['name'] ?? "guest";
$cartItem = $_SESSION['cart'];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $total_price = 0;    
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //$payment_method = req('payment') ?? redirect("/");
    $total_price = $_SESSION['total_price'] ?? redirect("/");
    
    $pdo->beginTransaction();

    $stm = $pdo->prepare('INSERT INTO guest_order
                            (cust_name, total_price, `status`)
                            VALUES(?, ?, ?)');
    $stm->execute([$user, $total_price, false]);
    $order_id = $pdo->lastInsertId();

    $stm = $pdo->prepare('INSERT INTO order_food
                                (order_id, food_id, quantity)
                                VALUES(?, ?, ?)');
    foreach ($cartItem as $item) {
        $stm->execute([$order_id, $item->food_id, $item->quantity]);
    }
    $pdo->commit();

    $_SESSION['cart'] = [];
    //$_SESSION['order_id'] = $order_id;
    redirect("/page/searchOrder.php?order_id=$order_id");
}

//include "../_head.php";
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        $(document).ready(() => {
            $('[data-post]').on('click', e => {
                e.preventDefault();
                const url = e.target.dataset.post;
                const f = $('<form>').appendTo(document.body)[0];
                f.method = 'POST';
                f.action = url || location;
                f.submit();
                alert("Payment Successfully.")
            });
        })
    </script>
</head>

<title>Checkout</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #f5f6fa;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 900px;
        margin: 40px auto;
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0px 4px 20px rgba(0,0,0,0.1);
    }

    h2 {
        text-align: center;
        color: #2f3640;
    }

    .cart {
        margin-top: 20px;
    }

    .cart-item {
        display: flex;
        justify-content: space-between;
        padding: 12px 0;
        border-bottom: 1px solid #eee;
    }

    .cart-item:last-child {
        border-bottom: none;
    }

    .cart-item .details {
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .cart-item span.quantity {
        background: #dcdde1;
        padding: 5px 10px;
        border-radius: 8px;
        font-size: 14px;
    }

    .total {
        display: flex;
        justify-content: space-between;
        font-weight: bold;
        font-size: 18px;
        margin-top: 20px;
    }

    .payment-methods {
        margin-top: 30px;
    }

    .payment-methods label {
        display: block;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-bottom: 10px;
        cursor: pointer;
        transition: 0.2s;
    }

    .payment-methods input[type="radio"] {
        margin-right: 10px;
    }

    .payment-methods label:hover {
        background: #f1f2f6;
    }

    button {
        width: 100%;
        padding: 15px;
        background: rgba(157, 19, 231, 0.8);
        border: none;
        color: white;
        font-size: 16px;
        border-radius: 8px;
        cursor: pointer;
        margin-top: 20px;
        transition: 0.2s;
    }

    button:hover {
        background: #40739e;
    }
</style>

<div class="container">
    <h2>Checkout</h2>

    <!-- Cart Items -->
    <div class="cart">
        <?php foreach($cartItem as $item){
            echo "        
                <div class='cart-item'>
                    <div class='details'>
                        <span> $item->name </span>
                        <span class='quantity'> x$item->quantity</span>
                    </div>
                    <span>RM ".(currency($item->price))."/cup </span>
                    <span>RM ".(Currency($item->price * $item->quantity))." </span>
                </div>
            ";
            $total_price += $item->price * $item->quantity;
        } 
        $_SESSION['total_price'] = $total_price;
        ?> 
        
        <div class="total">
            <span>Total</span>
            <span><?= Currency($total_price) ?></span>
        </div>
    </div>

    <!-- Payment Methods -->
    <form class="payment-methods">
        <h3>Select Payment Method</h3>
        <label><input type="radio" name="payment" id="payment_method" checked> Credit / Debit Card</label>
        <label><input type="radio" name="payment" id="payment_method"> PayPal</label>
        <label><input type="radio" name="payment" id="payment_method"> FPX / Online Banking</label>
        <label><input type="radio" name="payment" id="payment_method"> eWallet (Touch ‘n Go, GrabPay)</label>
    </form>

    <button data-post="/page/payment.php">RM <?= Currency($total_price) ?></button>
</div>


