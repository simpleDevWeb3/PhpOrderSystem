export async function AddToCartApi(id) {
  /*
  $.ajax({
    method: "POST",
    url: "/server/cart.php",
    data: { id },
    dataType: "json",
  })
    .done((res) => {
      console.log("sended to server");
      if (res.status === "ok") {
        console.log("Cart saved:", res.cart_id);
        return true;
      } else if (res.status === "error") {
        console.log("Cart not  saved");
        return false;
      }
    })
    .catch((err) => console.error(err));*/
  try {
    const data = await fetch("/server/cart.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: JSON.stringify({ id }),
    });
    const res = await data.json();
    if (res.status !== "ok") throw new Error("Cart saved:", res.cart_id);
    else return true;
  } catch (err) {
    console.log(err);
  }
}
