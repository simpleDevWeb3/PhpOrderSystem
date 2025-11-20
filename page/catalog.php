<?php 
require_once "../_base.php";
require __DIR__."../../template/Card.php";
require __DIR__."../../template/CartItem.php";


session_start();
if (empty($_SESSION['name'])) {
    header("Location: /"); 
    exit;
    
}
$title = "breverage";
$user = $_SESSION['name'] ?? "guest";

include "../_head.php";

$beverage = [
    [
        "id" => 1,
        "name" => "Latte",
        "description" => "Creamy espresso with steamed milk",
        "price" => 4.50,
        "image" => "/images/latte.jpg"
    ],
    [
        "id" => 2,
        "name" => "Green Tea",
        "description" => "Organic green tea leaves, hot or iced",
        "price" => 3.00,
        "image" => "/images/green-tea.jpg"
    ],
    [
        "id" => 3,
        "name" => "Mango Smoothie",
        "description" => "Fresh mango blended with yogurt",
        "price" => 5.00,
        "image" => "/images/mango-smoothie.jpg"
    ],
    [
        "id" => 4,
        "name" => "Cappuccino",
        "description" => "Espresso with foamed milk",
        "price" => 4.00,
        "image" => "/images/cappuccino.jpg"
    ],
    [
        "id" => 5,
        "name" => "Lemonade",
        "description" => "Refreshing lemon drink with ice",
        "price" => 2.50,
        "image" => "/images/lemonade.jpg"
    ],
      [
        "id" => 6,
        "name" => "Coffee",
        "description" => "Hot brewed coffee",
        "price" => 3.50,
        "image" => "/images/coffee.jpg"
    ],
    [
        "id" => 7,
        "name" => "Tea",
        "description" => "Green or black tea",
        "price" => 2.50,
        "image" => "/images/tea.jpg"
    ],
    [
        "id" => 8,
        "name" => "Orange Juice",
        "description" => "Freshly squeezed",
        "price" => 4.00,
        "image" => "/images/orange-juice.jpg"
    ]
];



?>
<div class="template">

 <div class="Content">
      <!---product catalog ---->
    <ul class="product-list" >
      <?php foreach($beverage as $b=>$v): ?>
        <?php Card($v); ?>
      <?php endforeach; ?>
    </ul>
  

    <!---Cart ---->
    <ul class="cart" >
      <button class="close-cart"><i class="ri-arrow-right-line"></i></button>
  
      <h2>Cart</h2>
           <button class="place-order"  data-get="/page/payment.php"><i class="ri-wallet-line" style="  font-size: 18px;"></i>Place Order</button>
          <ul class="cart-list" style="padding: 0;"></ul>
  
      
    </ul>
</div>

</div>

<?php include "../_foot.php"?>