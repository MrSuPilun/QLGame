var toggler = document.getElementsByClassName("caret");
var i;

for (i = 0; i < toggler.length; i++) {
  toggler[i].addEventListener("click", function() {
    let arr = this.parentElement.childNodes;
    arr.forEach(e => {
      if (e.tagName == "UL") {
        e.classList.toggle("active");
      }
    });
    this.classList.toggle("caret-down");
  });
}
