const menu = document.querySelector("#menu");
const navbar = document.querySelector(".navber");
const close = document.querySelector("#close");
menu.addEventListener("click",(eo) => {
    navbar.classList.add("active");
    close.style.display = "none";
    close.style.display = "flex";
    menu.style.display = "none";
})

close.addEventListener("click",(eo) => {
    navbar.classList.remove("active");
    close.style.display = "none";
    menu.style.display = "flex";
})

window.onscroll = () => {
    navbar.classList.remove("active");
    close.style.display = "none";
}