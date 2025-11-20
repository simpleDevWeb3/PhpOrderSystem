<?php
session_start(); 
require_once __DIR__ . "/../_base.php";

// If user already has a name
if (isset($_SESSION['name']) && $_SESSION['name'] !== '') {
    redirect("../page/catalog.php");
}


if (isset($_POST['name'])) {
   if(!$_POST['name'])  redirect("../"); 
    $_SESSION["name"] = $_POST['name'];
    redirect("../page/catalog.php");

} else {
  
    if (basename($_SERVER['PHP_SELF']) !== "index.php") {
        redirect("../"); 
    }
}
