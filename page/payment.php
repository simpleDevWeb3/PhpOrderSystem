<?php
require "../_base.php";

session_start();
if (empty($_SESSION['name'])) {
    header("Location: /"); 
    exit;
}
$user = $_SESSION['name'] ?? "guest";
$cartItem = $_SESSION['cart'];
$total_price = 0;
//include "../_head.php";


?>


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
</head>
<body>

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
                    <span>RM $item->price/cup </span>
                    <span>RM ".($item->price * $item->quantity)." </span>
                </div>
            ";
            $total_price += $item->price * $item->quantity;
        } ?> 
        
        <div class="total">
            <span>Total</span>
            <span><?= $total_price ?></span>
        </div>
    </div>

    <!-- Payment Methods -->
    <div class="payment-methods">
        <h3>Select Payment Method</h3>
        <label><input type="radio" name="payment" checked> Credit / Debit Card</label>
        <label><input type="radio" name="payment"> PayPal</label>
        <label><input type="radio" name="payment"> FPX / Online Banking</label>
        <label><input type="radio" name="payment"> eWallet (Touch ‘n Go, GrabPay)</label>
    </div>

    <button>RM <?= $total_price ?></button>
</div>