const toggleSidebar = document.querySelector(".m-collapse-toggle");
const sidebar = document.querySelector(".m-sidebar");

toggleSidebar.addEventListener("click", function () {
	sidebar.classList.toggle("toggle");
	toggleSidebar.classList.toggle("toggled");
});
