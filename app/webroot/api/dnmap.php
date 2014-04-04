<?php
header("Content-Type: application/json; charset=utf-8");

define("BING_MAPS_KEY", "AslevSPH0Iqsp6Cx8aOCktPMEHVkDPpHAu1KCyuJKUy9GXyAWKL9Kadd8gF53WeF");
define("COUNTRY", "DE");

$address = $_GET["address"];
$plz = $_GET["plz"];
$town = $_GET["town"];

// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
$options = array(
  CURLOPT_URL => 'http://dev.virtualearth.net/REST/v1/Locations',
  CURLOPT_HEADER => false,
  CURLOPT_RETURNTRANSFER => true
);

// adminDistrict&locality=locality&postalCode=postalCode&addressLine=addressLine&userLocation=userLocation&userIp=userIp&usermapView=usermapView&includeNeighborhood=includeNeighborhood&maxResults=maxResults&key=BingMapsKey
$location = array(
  "countryRegion" => COUNTRY,
  "locality" => $town,
  "postalCode" => $plz,
  "addressLine" => $address,
  "maxResults" => 5,
  "key" => BING_MAPS_KEY
);

$params = array();

foreach ($location as $key => $val) {
  //$params[] = "$key=$val";
  $params[] = "$key=" . rawurlencode($val);
}

$options[CURLOPT_URL] .= "?" . implode("&", $params);

curl_setopt_array($ch, $options);

$json = curl_exec($ch);

// close cURL resource, and free up system resources
curl_close($ch);

// print json string
echo $json;
