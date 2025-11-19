// ============================================================================
// General Functions
// ============================================================================

// ============================================================================
// Page Load (jQuery)
// ============================================================================
import { AddToCartApi } from "./service.js";
$(() => {
  const cart = $(".cart");
  const productList = $(".product-list");

  const showCart = () => {
    cart.addClass("show-affect");
    productList.addClass("show-affect-list");
  };

  const closeCart = () => {
    cart.removeClass("show-affect");
    productList.removeClass("show-affect-list");
  };

  let timeoutId = null;
  const toast_show = () => {
    const toaster = $(".toaster");
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

  //add-cart
  $("[data-post]").on("click", async function (e) {
    const id = this.dataset.post;
    console.log(id);

    e.preventDefault();
    const success = await AddToCartApi(id);

    if (success) {
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
