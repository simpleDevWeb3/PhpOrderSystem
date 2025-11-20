<?php 
require __DIR__."/template/Card.php";
require '_base.php' ;
require './server/guest.php';

$title = "Foodie";
$user = $_SESSION['name'] ?? "guest";

?>

<?php include '_head.php' ?>



<div class="template">
  <div class="Content home-hero">
    <div class="hero-text">
      <h1>Comfort Food & Signature Drinks</h1>
      <h2>Feel at Home with Every Bite</h2>
    </div>

    <form method="POST" action="/server/guest.php" style="display: flex; flex-direction:column; justify-content:center; align-items:center; gap:1.5rem; min-width:25%;" >

     <?php if ($user == "guest"): ?>
        <input name="name" class="name-input" placeholder="Your Full Name">
     <?php endif; ?>

      <button  class="start-order" type="submit">Start Ordering</button>
    </form>
  </div>

</div>

<?php include '_foot.php' ?>