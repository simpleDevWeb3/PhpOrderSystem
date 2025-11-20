import { format_currency } from "../util.js";

export function CartItem(item) {
  const { food_id: id, name, price, quantity, photo } = item;
  /* <p class='desc'>${description}</p>*/
  const html = `<li data-id=${id} class='card'>
  <div class='img-container'>
    <img class='product-img' src='/images/product/${photo}'>
   </div>
   <div class='card-info' style='padding:0.5rem 1rem;'>
      <p class='name'>${name}</p>

         </br>
         <p class='price'> $${format_currency(price)}</p> 
      </div>
    
      <div class='cart-operation'>
        <button data-decrease=${id}   class='operation-btn increase'><i class="ri-subtract-line"></i></button>
        <label>x${quantity} </label>
        <button data-increase=${id} class='operation-btn decrease'>
           <i class="ri-add-line"></i>
        </button>
        <span data-delete=${id}  class="trash delete"><i class="ri-close-fill"></i></span>
      </div>
   
    </li>`;

  return html;
}
