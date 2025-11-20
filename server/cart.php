<?php
session_start();
require_once __DIR__."/../_base.php";
header('Content-Type: application/json');

// Dummy data
/*
$beverages = [
    (object)["id" => 1, "name" => "Latte", "description" => "Creamy espresso with steamed milk", "price" => 4.50, "image" => "/images/latte.jpg"],
    (object)["id" => 2, "name" => "Green Tea", "description" => "Organic green tea leaves, hot or iced", "price" => 3.00, "image" => "/images/green-tea.jpg"],
    (object)["id" => 3, "name" => "Mango Smoothie", "description" => "Fresh mango blended with yogurt", "price" => 5.00, "image" => "/images/mango-smoothie.jpg"],
    (object)["id" => 4, "name" => "Cappuccino", "description" => "Espresso with foamed milk", "price" => 4.00, "image" => "/images/cappuccino.jpg"],
    (object)["id" => 5, "name" => "Lemonade", "description" => "Refreshing lemon drink with ice", "price" => 2.50, "image" => "/images/lemonade.jpg"],
    (object)["id" => 6, "name" => "Coffee", "description" => "Hot brewed coffee", "price" => 3.50, "image" => "/images/coffee.jpg"],
    (object)["id" => 7, "name" => "Tea", "description" => "Green or black tea", "price" => 2.50, "image" => "/images/tea.jpg"],
    (object)["id" => 8, "name" => "Orange Juice", "description" => "Freshly squeezed", "price" => 4.00, "image" => "/images/orange-juice.jpg"]
];*/

$stmt = $pdo->query("Select * From food");
$beverages = $stmt->FETCHALL();


// Read JSON input
$data = json_decode(file_get_contents("php://input"), true);
$itemId = $data['id'] ?? null;
$itemQuantity = $data['quantity'] ?? 1; // default 1 if not provided

if ($itemId !== null) {
    // Find product by ID
    $product = null;
    foreach ($beverages as $b) {
        if ($b->food_id == $itemId) {
            $product = $b;
            break;
        }
    }

    if ($product) {
        // Initialize cart session if not exists
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $found = false;
        foreach ($_SESSION['cart'] as $index => $cartItem) {
            if ($cartItem->food_id == $product->food_id) {
                // Product exists → increase quantity
                if (!isset($cartItem->quantity)) {
                    $cartItem->quantity = 0;
                }
                $cartItem->quantity += $itemQuantity;

                // Remove item if quantity is 0 or less
                if ($cartItem->quantity <= 0 || $itemQuantity === 0) {
                    unset($_SESSION['cart'][$index]);
                    // Reindex array
                    $_SESSION['cart'] = array_values($_SESSION['cart']);
                } else {
                    // Update cart with new quantity
                    $_SESSION['cart'][$index] = $cartItem;
                }

                $found = true;
                break;
            }
        }

        if (!$found && $itemQuantity > 0) {
            // Product not in cart → add new
            $product->quantity = $itemQuantity;
            $_SESSION['cart'][] = $product;
        }

        echo json_encode([
            "status" => "ok",
            "cart" => $_SESSION['cart']
        ]);
        exit;
    }
}

// If ID missing or product not found
echo json_encode([
    "status" => "error",
    "message" => "Product not found or ID missing"
]);
