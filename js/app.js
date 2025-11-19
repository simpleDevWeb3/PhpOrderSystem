import { AddToCartApi } from "./service.js";
import { CartItem } from "./UI/CartItem.js";
$(document).ready(() => {
  //element
  const cart = $(".cart");
  const productList = $(".product-list");
  const loader = `<div class="loader" style="position:fixed; z-index:999; left:45%; top:45%;"></div>`;
  const overlay = $(".overlay");
  //func
  const showLoader = () => {
    $("body").append(loader);
    
  };
  const hideLoader = () => {
    $(".loader").remove();
  };
  const showCart = () => {
    cart.addClass("show-affect");
    productList.addClass("show-affect-list");

    console.log(cart);
    console.log(productList);
  };

  const closeCart = () => {
    cart.removeClass("show-affect");
    productList.removeClass("show-affect-list");
  };

  const appendCartList = (items) => {
    const cart_list = $(".cart-list");

    if (!items || items.length === 0) {
      cart_list.html(" ");
      cart.removeClass("show-affect");
      productList.removeClass("show-affect-list");
      return;
    }

    //empty
    cart_list.html(" ");

    const list_item_html = items.map((item) => CartItem(item)).join("");
    cart_list.append(list_item_html);
  };

  let timeoutId = null;
  const toast_show = (
    msg = '<span>Added To Cart!</span><i style="color: rgba(69, 212, 29, 1); " class="ri-checkbox-circle-fill"></i>'
  ) => {
    const toaster = $(".toaster");
    toaster.html(msg);
    toaster.addClass("show-toast");

    if (timeoutId) clearTimeout(timeoutId);

    timeoutId = setTimeout(() => {
      toaster.removeClass("show-toast");
      timeoutId = null;
    }, 1500);
  };

  $("[data-get]").on("click", function (e) {
    e.preventDefault();
    const url = this.dataset.get;

    if (url) location.href = url;
  });
  //increase item
  $(document).on("click", "[data-increase]", async function (e) {
    e.preventDefault();
    const id = this.dataset.increase;
    console.log("Increase clicked:", id);
    showLoader();
    const cartData = await AddToCartApi(id, +1);
    hideLoader();
    if (cartData) {
      appendCartList(cartData);
      showCart();
      toast_show();
    } else {
      console.log("something wrong happens");
    }
  });
  //decrese item
  $(document).on("click", "[data-decrease]", async function (e) {
    e.preventDefault();
    const id = this.dataset.decrease;
    console.log("Decrease clicked:", id);
    showLoader();
    const cartData = await AddToCartApi(id, -1);
    hideLoader();
    if (cartData) {
      appendCartList(cartData);
      showCart();
      toast_show(` 
        <span>Removed From Cart!</span><i style="color: rgba(212, 29, 29, 1); "class="ri-close-circle-fill"></i>`);
    }
  });

  $(document).on("click", "[data-delete]", async function (e) {
    e.preventDefault();
    const id = this.dataset.delete;
    const card = $(`.cart-list [data-id='${id}']`);

    console.log("Decrease clicked:", id);

    card.css("transform", "translateX(0rem)");
    showLoader();
    const cartData = await AddToCartApi(id, 0);
    hideLoader();
    if (cartData) {
      appendCartList(cartData);
      showCart();
      toast_show(` 
        <span>Removed From Cart!</span><i style="color: rgba(212, 29, 29, 1); "class="ri-close-circle-fill"></i>`);
    }
  });
  //add-cart
  $("[data-post]").on("click", async function (e) {
    const id = this.dataset.post;
    console.log(id);

    e.preventDefault();
    showLoader();
    const cartData = await AddToCartApi(id, 1);
    hideLoader();
    console.log(cartData);
    if (cartData) {
      appendCartList(cartData);
      showCart();
      toast_show();
    } else console.log("something wrong happens");
  });

  $(".close-cart").on("click", closeCart);

  $(document).on("click", function (e) {
    if (
      !$(e.target).closest(".cart").length &&
      !$(e.target).is("[data-post]")
    ) {
      closeCart();
    }
  });
});
