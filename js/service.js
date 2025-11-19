export async function AddToCartApi(id, quantity) {
  try {
    const res = await fetch("/server/cart.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ id, quantity }),
    });

    const data = await res.json();
    if (data.status !== "ok") throw new Error("Cart error");
    return data.cart;
  } catch (err) {
    console.error(err);
  }
}


