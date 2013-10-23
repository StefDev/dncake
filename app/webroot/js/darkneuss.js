document.addEventListener("DOMContentLoaded", function() {
  var matches = document.querySelectorAll("div#content>section.clicklist>h1");
  for (var i = 0, j = matches.length; i < j; i++) {
    matches[i].addEventListener("click", toogleLocations, false)
  }
});

function toogleLocations() {
  var matches = document.querySelectorAll("article[id^=" + this.id + "]"),
      locationsOpened = matches[0].style.display == "block";
  for (var i = 0, j = matches.length; i < j; i++) {
    if (locationsOpened) {
      matches[i].style.display = "none";
    } else {
      matches[i].style.display = "block";
    }
  }
}
