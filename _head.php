<?php $title = $title ?? 'index'; ?>
<!DOCTYPE html>
<html lang="en">
  
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" defer></script>

  <script  type="module" src="/js/app.js" defer></script>
  <style>

     body, html {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    /* This wraps everything (header, content, footer) */
    .page-container {
        min-height: 100vh;           /* Full screen height */
        display: flex;
        flex-direction: column;      /* Stack vertically */
    }

    /* This is your content area */
    .content-wrapper {
        flex: 1;                     /* Push footer to bottom */
    }

    footer {
        text-align: center;
        padding: 15px 0;
        background: #f3f3f3;
        margin-top: auto;            /* Forces it to stay at the bottom */
    }
    body {
      display: grid;
      min-height: 100vh;
      margin: 0;
      display: flex;
      flex-direction: column; 
      font-family: "Roboto", sans-serif;
    }
    .left{

    }
    .center{

    }
    .right{

    }
    
    nav {
      background-color: rgba(157, 19, 231, 0.8);
      display: flex;
      position: fixed;
      left: 0;
      right: 0;
      z-index: 888;
      display: flex;
      justify-content: space-between;
      align-items: center;
      color: white;
    }

    nav button {
      border: none;
      padding: 0.5rem 1rem;
      font-weight:500;
           color: white;
      cursor: pointer;
      background-color: inherit;
      transition: background-color 0.2s;
      font-size: 1.2rem;
    }

    nav button:hover {
      background-color:  rgba(188, 28, 232, 0.5);
    }

    nav button.active {
     background-color: rgba(188, 28, 232, 0.8);
     
     font-weight:600;

    }

    footer{
      background-color: rgba(171, 171, 171, 0.8);
    }

    .template{
     
       flex: 1;

        
    }

    .Content{
      display: flex;
      justify-content: center;
      align-items: center;
      padding-top: 2rem;
    }

.card{
  display: grid;
  grid-template-columns: 1fr 4fr 1fr;
  gap:1rem;
  align-items: center;
  border-bottom: solid 1px rgba(0,0,0,0.1);
  padding: 1rem 0;
  position: relative;

 
}


    
    .card >button{
      cursor: pointer;
      border: none;
      border-radius: 25px;
      padding: 0.5rem 1rem;
      max-width: 10rem;
    }
    .card .card-info p{
      margin: 0;
    
    }
    .card .price{
      font-size: 1.3rem;
      font-weight: 600;

    }
    
    .cart-icon{
      cursor: pointer;
      font-size: 1.5rem;
      transition: all 0.15 ease;
    }
    .cart-icon:hover{
      opacity: 0.6;
    }
    .navbar{
      padding:0.5rem 1rem;
    }
    .cart{
      position: fixed;
      border: solid 1px rgba(0,0,0,0.1);
      background-color: white;
      transform: translateX(50rem);
      transition: transform 0.4s ease;
      right:0;
      top:2rem;
      height: 95%;
      overflow-y: scroll;
       z-index: 999;
      border-radius: 25px;
      max-height: 90%;
      display:flex; 
      flex-direction: column;
      flex:1;
      max-width: 600px;
      padding: 0.5rem 4rem;
    }
    .operation-btn{
      border-radius: 50%;
       padding: 0.5rem 0.6rem;
      background-color: rgba(0,0,0,0.1);
      border: none;
      display: flex;
      justify-content: center;
      align-items: center;
      cursor: pointer;
    }
    .operation-btn:hover{
      opacity: 0.8;
    }
    .trash{
      border-radius: 50%;
      cursor: pointer;
      transition:all 0.15s ease;
      padding: 0.5rem 0.6rem;
      background-color: rgba(203, 21, 21, 0.81);
      color: white;
    }
    .trash:hover{
     opacity: 0.8;
    }
    .product-list{
      
     transition: transform 0.4s ease;
     max-width: 700px;
     display:grid; grid-template-rows:1fr; 
     flex:1;
  
     @media(max-width:800px){
      min-width: 100%;
     }
      
    }
    .show-affect{
       transform: translateX(0);
    }
    .show-affect-list{
       transform: translateX(-26rem);
    }

 .close-cart {
  position: sticky;
 
  top: 10px;           /* adjust as needed */
  right: 0;         /* recommended instead of left: 0 */

  width: 30px;         /* same width & height → circle */
 

  display: flex;
  align-items: center;
  justify-content: center;

  cursor: pointer;
  background-color: rgba(131, 22, 220, 0.83);
  color: white;
  border-radius: 50%;  /* makes it fully round */
  border: none;
  font-size: 25px;
  font-weight: bold;
  
}
.cart-operation{
  display: flex;
  gap: 0.5rem;
  align-items: center;
}
.place-order{
  position:sticky;
  left: 0;         
  padding: 0.8rem 1rem;
  max-width: 10rem;
   background-color: rgba(131, 22, 220, 0.83);
   color: white;
   font-weight: 600;
   cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  gap:0.5rem;
  border-radius: 25px;
  border: none;
  
}
.logo{
  font-weight: 700;
  font-size: 25px;
}
.toaster{
  z-index:9999; 
  position:fixed; 
  left:40%; 
  right:50%; 
  top:0; 
  border:solid 1px rgba(0,0,0,0.1);
  border-radius:25px; 
  padding:1rem 2rem; 
  background:rgba(255, 255, 255, 0.95);
  transform: translateY(-500px);
  transition:transform 0.15s ease;
  display: flex;
  justify-content: center;
  gap:0.5rem;
  box-shadow:1px 1px 5px rgba(0,0,0,0.1);
  font-weight: 700;
  min-width: 200px;
  
}
.show-toast{
    transform: translateX(0px);
}



.home-hero {

  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-start;
  padding: 4rem 60px;
}



.hero-text h1 {
  font-size: 3.5rem;
  font-weight: 700;
  margin-bottom: 10px;
  color: #a828daff;
  text-shadow: 0 3px 10px rgba(0,0,0,0.4);
}

.hero-text h2 {
  font-size: 1.6rem;
  font-weight: 400;
  color: #9e21a9ff;
  margin-top: 10px;
  text-shadow: 0 2px 8px rgba(0,0,0,0.4);
}
.name-input {
  width: 100%;
  padding: 0.75rem 1rem;
  
  background: #fff;
  border: 1px solid rgba(0,0,0,0.15);
  border-radius: 25px;

  font-size: 1rem;
  color: #333;

  outline: none;
  transition: 0.25s ease;
  height: 1rem;

  box-shadow: 0 2px 6px rgba(0,0,0,0.04);
}

.name-input:focus {
  border-color: rgba(255, 0, 234, 0.6);
  box-shadow: 0 0 0 4px rgba(255, 0, 238, 0.15);
}

.start-order{
  background-color: #9e21a9ff; 
  color:whitesmoke;
  padding: 1rem 2rem;
  border-radius: 25px;
  border: none;
  font-size: 18px;
}


/* HTML: <div class="loader"></div> */
.loader {
  width: 15px;
  aspect-ratio: 1;
  border-radius: 50%;
  animation: l5 1s infinite linear alternate;
}
@keyframes l5 {
    0%  {box-shadow: 20px 0 #000, -20px 0 #0002;background: #000 }
    33% {box-shadow: 20px 0 #000, -20px 0 #0002;background: #0002}
    66% {box-shadow: 20px 0 #0002,-20px 0 #000; background: #0002}
    100%{box-shadow: 20px 0 #0002,-20px 0 #000; background: #000 }
}
  </style>
</head>
<body>

<nav class="navbar">
  <div>
    <label class="logo"  data-get="/">Foodie</label>
  </div>
  <div>
  <form action="/page/searchOrder.php" method="GET" style="display:flex;gap:8px;align-items:center;">
    <input 
        type="number" 
        name="order_id" 
        placeholder="Search order number..." 
        
        style="padding:6px;border:1px solid #ccc;border-radius:4px;"
    >
    <button type="submit" style="padding:6px 12px;border:none;border-radius:4px;background:#007bff;color:white;">
        Search
    </button>
  
</form>
</div>
<div>
  <span><?= htmlspecialchars($user) ?></span>
</div>
</nav>
<p class="toaster">

 </p>



