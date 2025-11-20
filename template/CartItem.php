 <?php
//remember change to data->value
 function CartItem($data){
  echo "<li class='card'>";
    echo "<p>".$data["name"]."</p>";
      echo "<div class='card-info'>";
        echo "<p class='name'>".$data["name"]."</p>";
         echo "<p class='desc'>".$data["description"]."</p>" ;
         echo "</br>";
        echo  "<p class='price'> $".Currency($data["price"])  ."</p>" ;
  
      echo "</div>";
     echo "<label> x1 </label>";
    echo "</li>";
  }
   
 ?>