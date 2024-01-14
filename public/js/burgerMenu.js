function burgermenu() {
    const sideBar = document.getElementById('burgerbar')
    sideBar.classList.toggle('hidden');
}

document.getElementById("burger").addEventListener('click', burgermenu);
document.getElementById("close").addEventListener('click', burgermenu);
