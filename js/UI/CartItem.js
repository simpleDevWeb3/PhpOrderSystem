import { format_currency } from "../util.js";

export function CartItem(item) {
  const { name, description, price, quantity } = item;

  const html = 
  `<li data-id=${item.id} class='card'>
   <p>${name}</p>
   <div class='card-info' style='padding:0.5rem 1rem;'>
      <p class='name'>${name}</p>
         <p class='desc'>${description}</p> 
         </br>
         <p class='price'> $${format_currency(price)}</p> 
      </div>
    
      <div class='cart-operation'>
        <button data-decrease=${item.id}   class='operation-btn increase'><i class="ri-subtract-line"></i></button>
        <label>x${quantity} </label>
        <button data-increase=${item.id} class='operation-btn decrease'>
           <i class="ri-add-line"></i>
        </button>
        <span data-delete=${item.id}  class="trash delete"><i class="ri-close-fill"></i></span>
      </div>
   
    </li>`;

  return  html;
}
