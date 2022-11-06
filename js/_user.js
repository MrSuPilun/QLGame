/*----- Modal -----*/
const modal1 = document.getElementsByClassName("exampleModal");
const closes1 = document.getElementsByClassName("modal-btn-close");
for (let i = 0; i < closes1.length; i++) {
	closes1[i].addEventListener('click', function() {
		modal1[0].className = modal1[0].className.replace(" show", "");
	});
}
