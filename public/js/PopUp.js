function toggleOverlay() {
    var overlay = document.getElementById("overlay");
    overlay.classList.toggle("hidden");
}

function handleFormSubmit(event) {

}

document.getElementById("addcategory").addEventListener("click", toggleOverlay);






document.getElementById("overlay").addEventListener("click", function(event) {
    if (event.target.id === "overlay") {
        toggleOverlay();
    }
});

document.getElementById("overlay-form").addEventListener("submit", handleFormSubmit);