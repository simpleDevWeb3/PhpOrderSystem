<?php

// ============================================================================
// PHP Setups
// ============================================================================

function dump($var){
    echo"<br/>";
     echo"<br/>";
    echo "<pre>";       // correct tag
    var_dump($var);
    echo "</pre>";      // correct closing tag
    exit;
}
function Currency($price){
  return number_format($price, 2);
}

function redirect($url) {
    header("Location: $url");
    exit(); // stop further code
}


