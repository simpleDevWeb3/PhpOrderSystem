<?php $title = $title ?? 'index'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

  <script  type="module" src="/js/app.js"></script>
  <style>
    body {
      display: grid;
      height: 100vh;
      margin: 0;
      grid-template-rows:  1fr auto;
  
    }

    nav {
      background-color: rgba(157, 19, 231, 0.8);
      display: flex;
      position: fixed;
      left: 0;
      right: 0;
      z-index: 888;
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
      padding-top: 2rem;
      
        
    }

    .Content{
      display: flex;
      justify-content: center;
    }

    .card{
      display: grid;
      grid-template-columns: 1fr 4fr 1fr;
      align-items: start;
      gap:1rem;
      align-items: center;
      border-bottom: solid 1px rgba(0,0,0,0.1);
      padding-top: 1rem;
      padding-bottom: 1rem;
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
    .cart{
      position: fixed;
      border: solid 1px rgba(0,0,0,0.1);
      background-color: white;
      transform: translateX(50rem);
      transition: transform 0.4s ease;
      right:0;
      top:0rem;
      height: 95%;
      overflow-y: scroll;
       z-index: 999;
      border-radius: 25px;

      display:grid; grid-template-rows:1fr; flex:1;
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

  width: 35px;         /* same width & height → circle */
  height: 35px;

  display: flex;
  align-items: center;
  justify-content: center;

  cursor: pointer;
  background-color: rgba(131, 22, 220, 0.83);
  color: white;
  border-radius: 50%;  /* makes it fully round */
  border: none;
  font-size: 18px;
  font-weight: bold;
}

.place-order{
  position:sticky;
  margin-left: 70%;
  bottom: 10px;           
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
  </style>
</head>
<body>

<nav>
  <button class="<?= $title === 'food' ? 'active' : '' ?>" data-get="/">food</button>
  <button class="<?= $title === 'breverage' ? 'active' : '' ?>" data-get="/page/catalog.php">breverage</button>
  <button class="<?= $title === 'cart' ? 'active' : '' ?>" data-get="/page/demo2.php">cart</button>
  <form action="/page/searchOrder.php" method="GET" style="display:flex;gap:8px;align-items:center;">
    <input 
        type="text" 
        name="order_no" 
        placeholder="Search order number..." 
        required
        style="padding:6px;border:1px solid #ccc;border-radius:4px;"
    >
    <button type="submit" style="padding:6px 12px;border:none;border-radius:4px;background:#007bff;color:white;">
        Search
    </button>
</form>

</nav>


</body>
</html>
