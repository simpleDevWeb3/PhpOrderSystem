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

$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$dbname = "cafeteria";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully!"; // (Optional test)
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

