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
$stmt = $pdo->query("Select * From food");
$beverages = $stmt->FETCHALL();

?>
<div class="template">

 <div class="Content">
      <!---product catalog ---->
    <ul class="product-list" >
      <?php foreach($beverages as $v): ?>
       
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