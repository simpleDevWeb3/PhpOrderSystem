<?php
 
function Card($data){
    echo "<li class='card'>";
        echo "<div class='img-container'>";
        echo "<img class='product-img' src='/images/product/$data->photo'/>";
        echo "</div>";
        echo "<div class='card-info'>";
            echo "<p class='name'>".$data->name."</p>";
      
            echo "<br>";
            echo "<p class='price'>$".Currency($data->price)."</p>";
        echo "</div>";
       
        echo "<button data-post='".$data->food_id."'>Add To Cart</button>";
    echo "</li>";
}
?>
