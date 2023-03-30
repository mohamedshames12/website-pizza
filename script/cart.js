window.onscroll = () => {
    yourCarts.classList.remove("active");
}

let carts = document.getElementById("carts");
let yourCarts = document.querySelector('.your-carts');
let closeCart = document.querySelector('#close-cart');
carts.addEventListener("click", (eo) => {
    yourCarts.classList.add("active");
})

closeCart.addEventListener("click", (eo) => {
    yourCarts.classList.remove("active");
})

