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

const user = document.getElementById("user");
const infoUser = document.querySelector(".info-user");

user.addEventListener("click", () => {
    infoUser.classList.toggle("active");
}
)

function loader(){
    document.querySelector('.loader').style.display = "none";
}

function fadeOut(){
    setInterval(loader, 3000);
}

window.onload = fadeOut;