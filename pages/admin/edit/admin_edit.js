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
    window.location.href = "login.php";
}


function toggleDropdown() {
    document.querySelector('.user-menu').classList.toggle('active');    
}

// Close dropdown when clicking outside
document.addEventListener('click', function (event) {
    const userMenu = document.querySelector('.user-menu');
    if (!userMenu.contains(event.target)) {
        userMenu.classList.remove('active');
    }
});