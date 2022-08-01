const menu_active = document.getElementsByClassName("m-menu-item");
const menu_active_a = document.querySelectorAll(".m-menu-item a");
for (e of menu_active) {
    e.onclick = function () {
        for (element2 of menu_active) element2.classList.remove("active");
        this.classList.add("active");
        console.log(this);
    };
}

for (e of menu_active_a) {
    for (element2 of menu_active) element2.classList.remove("active");
}
