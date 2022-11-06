/*----- Modal -----*/
const modal = document.getElementById("exampleModal");
const closes = document.getElementsByClassName("modal-btn-close");
for (let i = 0; i < closes.length; i++) {
	closes[i].addEventListener('click', function() {
		modal.className = modal.className.replace(" show", "");
	});
}
