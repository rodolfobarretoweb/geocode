<?php

class Geocode{
  const URL = "http://maps.googleapis.com/maps/api/geocode/json?";

  /*
    Get latitude and longitude by address ("Rio de Janeiro, Ipanema")
  */
  public function getLatLngByAddress($address) {
    $address = urlencode($address);
    $data    = file_get_contents(self::URL . 'address=' . $address . '&sensor=true');
    $data    = json_decode($data);

    if($data->status == 'OK'){
      $lat = $data->results[0]->geometry->location->lat;
      $lng = $data->results[0]->geometry->location->lng;

      return array('lat' => $lat,'lng' => $lng);
    } else {
      return false;
    }
  }
}