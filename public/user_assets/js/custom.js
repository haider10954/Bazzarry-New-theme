let modal = document.querySelector(".modal");
let triggers = document.querySelectorAll(".trigger");
let closeButton = document.querySelector(".close-button");

function toggleModal() {
    modal.classList.toggle("show-modal");
}

function windowOnClick(event) {
    if (event.target === modal) {
        toggleModal();
    }
}

for (let i = 0, len = triggers.length; i < len; i++) {
    triggers[i].addEventListener("click", toggleModal);
}
closeButton.addEventListener("click", toggleModal);
window.addEventListener("click", windowOnClick);
