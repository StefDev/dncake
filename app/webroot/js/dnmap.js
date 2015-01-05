// https://www.bingmapsportal.com
// http://msdn.microsoft.com/en-us/library/gg427609.aspx
// http://social.technet.microsoft.com/wiki/contents/articles/20958.migrating-bing-maps-v6-3-to-v7.aspx

document.addEventListener("DOMContentLoaded", function() {
  if (typeof(locations) === "object") { GetMap(locations) };
});

var mapOptions = {
  credentials: "AslevSPH0Iqsp6Cx8aOCktPMEHVkDPpHAu1KCyuJKUy9GXyAWKL9Kadd8gF53WeF",
  center: new Microsoft.Maps.Location(51.1962890625, 6.69409990310669), // Neuss
  mapTypeId: Microsoft.Maps.MapTypeId.road,
  zoom: 12
}

var pininfo = new Array();

function GetMap(locations) {
  var map = new Microsoft.Maps.Map(document.getElementById("mapDiv"), mapOptions);

  // Retrieve the location of the map center 
  //var center = map.getCenter();

  var index = 0,
      endindex = locations.length,
      pin = new Array();

  // Retrieve the latitude and longitude values- normalize the longitude value
  for (;index < endindex; index++) {
    var latVal = parseFloat(locations[index].latitude);
    var longVal = Microsoft.Maps.Location.normalizeLongitude(parseFloat(locations[index].longitude));
    var pinLocation = new Microsoft.Maps.Location(latVal, longVal);
    var showInfobox = window.location.hash === '#'+locations[index].locid && locations[index].longitude != null && locations[index].latitude != null;

    // setView
    //map.setView({ center: new Microsoft.Maps.Location(latVal, longVal) });

    pin = new Microsoft.Maps.Pushpin(pinLocation, { zIndex: index, typeName: "dnpin", icon: "/img/template/dnpin.png" });

    pininfo[index] = new Microsoft.Maps.Infobox(pin.getLocation(),
    {
      title: (locations[index].locurl != null) ? "<a href=\"" + locations[index].locurl + "\">" + locations[index].name + "</a>" : locations[index].name,
      description: locations[index].street + "<br />" + locations[index].plz + " " + locations[index].town,
      visible: showInfobox,
      offset: new Microsoft.Maps.Point(0,15)
    });

    // Add handler for the pushpin click event
    Microsoft.Maps.Events.addHandler(pin, 'click', function(e) { displayInfobox(e.target._zIndex) } );

    // Hide infobox when the map is moved
    //Microsoft.Maps.Events.addHandler(map, 'viewchange', function(e) { hideInfobox(e.target._zIndex) } );

    // Add the pin to the map
    map.entities.push(pin);
    map.entities.push(pininfo[index]);
     
    // Set view to selected location
    if (showInfobox) {
      map.setView({
        center: pinLocation,
        zoom: 15
      });
    }
  }                
}

function displayInfobox(index) {    
  pininfo[index].setOptions({ visible: true });
}

function hideInfobox(index) {
  pininfo[index].setOptions({ visible: false });
}

/*
https://developer.mozilla.org/en-US/docs/AJAX/Getting_Started
https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest
*/

/* geocoding functions */
var geocode = function() { // function expression - https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Functions
  var address = document.getElementById("LocationStreet").value,
      plz = document.getElementById("LocationPlz").value,
      town = document.getElementById("LocationTown").value;
  
  var elLat = document.getElementById("LocationLatitude"),
      elLng = document.getElementById("LocationLongitude");
      
  var httpRequest,
      requestUrl = '/api/dnmap.php?address=' + encodeURIComponent(address) + '&plz=' + plz + '&town=' + encodeURIComponent(town);

  var showVerificationLink = function(lat,lng) {
    var elLink = document.getElementById("verificationlink");
    
    if (elLink != null) {
      elLink.setAttribute("href", "http://bing.com/maps/default.aspx?cp=" + lat + "~" + lng + "&sp=point." + lat + "_" + lng + "_Location&lvl=16");
    } else {
      var elLink = document.createElement("a"),
          elLinkText = document.createTextNode(" Geo-Koordinaten auf Bing Maps pr\u00FCfen"),
          elForm = document.forms[0],
          elGeoDiv = document.getElementById("geodiv");
          elButton = document.getElementById("geocodebutton"),
          elFieldset = document.getElementsByTagName("fieldset")[0];

      elLink.appendChild(elLinkText);    
      elLink.setAttribute("href", "http://bing.com/maps/default.aspx?cp=" + lat + "~" + lng + "&sp=point." + lat + "_" + lng + "_Location&lvl=16");
      elLink.setAttribute("target", "_blank");
      elLink.id = "verificationlink";
      
      elGeoDiv.insertBefore(elLink, elButton.nextSibling);
    }
  }

  var handleLatLngResponse = function() {
    if (httpRequest.readyState === 4) {
      if (httpRequest.status === 200) {
        var responseJson = JSON.parse(httpRequest.responseText),
            point = responseJson.resourceSets[0].resources[0].point;
        elLat.value = point.coordinates[0];
        elLng.value = point.coordinates[1];
        showVerificationLink(elLat.value,elLng.value);
      }      
    } else {
    
    }
  }  

  if (window.XMLHttpRequest && (address + plz + town) != "") {
    httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = handleLatLngResponse;
    httpRequest.open('GET', requestUrl, true);
    httpRequest.send();
  }
}
