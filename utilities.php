<?php
/*
*Check if today's date is passed the expiration date [closed]
*  @param \DateTime|int $expiration: The value will be used as expiration date
* @return array: that pass expiration date
*  @throws InvalidExpiration
*/
function get_expired_item($expiration){
  if (!$expiration instanceof DateTime) {
    throw new InvalidExpiration('Expiration date must be an instance of DateTime or an integer');
  }

  $expiry= [];
  if (strtotime($expiration) < strtotime("now")) {
    $expiry[] = $expiration;
  }

  return $expiry;
}


// if if you have array of object to validate you can use
// array_filter

$ads_ = ['13 Nov 18', '13 Sep 18', '18 Nov 20'];

$expiry_items = array_filter($ads_,"get_expired_ads");
