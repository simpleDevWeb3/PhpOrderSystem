<?php
session_start();
header('Content-Type: application/json');


// Convert array to array of objects
$beverages = [
    (object)[
        "id" => 1,
        "name" => "Latte",
        "description" => "Creamy espresso with steamed milk",
        "price" => 4.50,
        "image" => "/images/latte.jpg"
    ],
    (object)[
        "id" => 2,
        "name" => "Green Tea",
        "description" => "Organic green tea leaves, hot or iced",
        "price" => 3.00,
        "image" => "/images/green-tea.jpg"
    ],
    (object)[
        "id" => 3,
        "name" => "Mango Smoothie",
        "description" => "Fresh mango blended with yogurt",
        "price" => 5.00,
        "image" => "/images/mango-smoothie.jpg"
    ],
    (object)[
        "id" => 4,
        "name" => "Cappuccino",
        "description" => "Espresso with foamed milk",
        "price" => 4.00,
        "image" => "/images/cappuccino.jpg"
    ],
    (object)[
        "id" => 5,
        "name" => "Lemonade",
        "description" => "Refreshing lemon drink with ice",
        "price" => 2.50,
        "image" => "/images/lemonade.jpg"
    ],
    (object)[
        "id" => 6,
        "name" => "Coffee",
        "description" => "Hot brewed coffee",
        "price" => 3.50,
        "image" => "/images/coffee.jpg"
    ],
    (object)[
        "id" => 7,
        "name" => "Tea",
        "description" => "Green or black tea",
        "price" => 2.50,
        "image" => "/images/tea.jpg"
    ],
    (object)[
        "id" => 8,
        "name" => "Orange Juice",
        "description" => "Freshly squeezed",
        "price" => 4.00,
        "image" => "/images/orange-juice.jpg"
    ]
];

//api end point
$data = json_decode(file_get_contents("php://input"), true);
$cartId = $data['id'] ?? null;

if ($cartId !== null) {
   
    $product = null;
    foreach ($beverages as $b) {
        if ($b->id == $cartId) {
            $product = $b;
            break;
        }
    }

    if ($product) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

       
        $idsInCart = array_map(fn($p) => $p->id, $_SESSION['cart']);
    
        if (!in_array($product->id, $idsInCart)) {
            $_SESSION['cart'][] = $product;
        }

        echo json_encode([
            "status" => "ok",
            "cart" => $_SESSION['cart']
        ]);
        exit;
    }
}

echo json_encode([
    "status" => "error",
    "message" => "Product not found or ID missing"
]);

