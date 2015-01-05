var wochentage = ["Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag"];

document.addEventListener("DOMContentLoaded", function() {
  var matches = document.querySelectorAll("div#content>section.clicklist>h1");
  for (var i = 0, j = matches.length; i < j; i++) {
    matches[i].addEventListener("click", toogleLocations, false);
  }

  var dates = document.querySelectorAll(".date");
  for (var i = 0, j = dates.length; i < j; i++) {
    dates[i].addEventListener("click", showDayOfWeek, false)    
  }
});

function toogleLocations() {
  var matches = document.querySelectorAll("article[id^=" + this.id + "]"),
      locationsOpened = matches[0].style.display === "block";
  for (var i = 0, j = matches.length; i < j; i++) {
    if (locationsOpened) {
      matches[i].style.display = "none";
    } else {
      matches[i].style.display = "block";
    }
  }
}

function showDayOfWeek() {
  if (this.querySelector("time") != null) {
    var datestring = this.querySelector("time").innerHTML;
    var datepart = new Date(datestring.substring(0,10));
    var dayOfWeek = document.createTextNode(" " + wochentage[datepart.getDay()]);
    this.appendChild(dayOfWeek);
    this.removeEventListener("click", showDayOfWeek, false);
  }
}
