// NAVIGATION BAR
const hamMenu = document.querySelector('.ham-menu');
const offScreenMenu = document.querySelector('.off-screen-menu');
const closeBtn = document.querySelector('.close-btn');

hamMenu.addEventListener('click', () => {
    hamMenu.classList.toggle('active');
    offScreenMenu.classList.toggle('active');
});

closeBtn.addEventListener('click', () => {
    hamMenu.classList.remove('active');
    offScreenMenu.classList.remove('active');
});

// MODAL
const modal = document.querySelector(".modal-container");
const overlay = document.querySelector(".modal-overlay");

function showModal(){
    modal.style.display = "flex";
    overlay.style.display = "block";
}

function hideModal(){
    modal.style.display = "none";
    overlay.style.display = "none";
}

function redirectToLogin(){
    window.location.href = "pages/login/login.php";
}