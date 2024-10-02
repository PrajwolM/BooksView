document.addEventListener("DOMContentLoaded", function () {
  var coll = document.getElementsByClassName("collapsible");

  for (var i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function () {
      this.classList.toggle("active");

      var content = this.nextElementSibling;
      if (content.style.display === "block") {
        content.style.display = "none";
      } else {
        content.style.display = "block";
      }
    });
  }

  var defaultOpen = document.querySelector(
    ".collapsible + .collapsibleContent.open"
  );
  if (defaultOpen) {
    defaultOpen.style.display = "block";
    var defaultButton = defaultOpen.previousElementSibling;
    if (defaultButton) {
      defaultButton.classList.add("active");
    }
  }
});
