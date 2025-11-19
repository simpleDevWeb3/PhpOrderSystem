<?php
 
function Card($data){
    echo "<li class='card'>";
        echo "<p>".$data["name"]."</p>";
        echo "<div class='card-info'>";
            echo "<p class='name'>".$data["name"]."</p>";
            echo "<p class='desc'>".$data["description"]."</p>";
            echo "<br>";
            echo "<p class='price'>$".Currency($data["price"])."</p>";
        echo "</div>";
       
        echo "<button data-post='".$data['id']."'>Add To Cart</button>";
    echo "</li>";
}
?>
