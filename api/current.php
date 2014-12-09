<?php

// Normally perform a real database request here.
// Other than that, the following are only dummy information.

$entries = array(
  array(
    "baustelle" => true,
    "titel" => "Lorem Ipsum Dolor",
    "art" => "Teilsperre",
    "text" => "Maecenas congue ligula ac quam viverra nec consectetur ante hendrerit. Donec et mollis dolor. Praesent et diam eget libero egestas mattis sit amet vitae augue. Nam tincidunt congue enim, ut porta lorem lacinia consectetur. Donec ut libero sed arcu vehicula ultricies a non tortor.",
    "zeitraum" => array(
      "datumstart" => "12.12.2014",
      "zeitstart" => "11:30",
      "datumende" => "13.12.2014",
      "zeitende" => "19:00"
    )
  ), 
  array(
    "sonstiges" => true,
    "titel" => "Unfall auf der A1 Westautobahn",
    "art" => "Teilsperre",
    "text" => "Maecenas congue ligula ac quam viverra nec consectetur ante hendrerit. Donec et mollis dolor. Praesent et diam eget libero egestas mattis sit amet vitae augue. Nam tincidunt congue enim, ut porta lorem lacinia consectetur. Donec ut libero sed arcu vehicula ultricies a non tortor.",
    "zeitraum" => array(
      "datumstart" => "28.8.2014",
      "zeitstart" => "14:20",
      "zeitende" => "16:20"
    )
  ), 
  array(
    "sperre" => true,
    "titel" => "Wasserrohrbruch in der Reinerstrasse",
    "art" => "Vollsperre",
    "text" => "Maecenas congue ligula ac quam viverra nec consectetur ante hendrerit. Donec et mollis dolor. Praesent et diam eget libero egestas mattis sit amet vitae augue. Nam tincidunt congue enim, ut porta lorem lacinia consectetur. Donec ut libero sed arcu vehicula ultricies a non tortor.",
    "zeitraum" => array(
      "datumstart" => "25.07.2014",
      "zeitstart" => "10:00",
      "datumende" => "27.07.2014",
      "zeitende" => "12:00"
    )
  )
);

$response = json_encode($entries);
?>