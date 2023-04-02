const menu = document.querySelector("#menu");
const navbar = document.querySelector(".navber");

menu.addEventListener("click",(eo) => {
    navbar.classList.add("active");
   
    close.style.display = "flex";
    menu.style.display = "none";
})


window.onscroll = () => {
    navbar.classList.remove("active");
    
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
    setInterval(loader, 2000);
}

window.onload = fadeOut;