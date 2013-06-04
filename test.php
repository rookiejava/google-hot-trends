<?php

require_once __DIR__ . '/ghottrend.php';

$hot = new GHotTrend();

//usage 1. gets the hot trend keywords as array
$keywords = $hot->get('array');
print_r($keywords);

echo '</br></br>';

//usage 2. gets hot trend keywords as json
$keywords = $hot->get('json');
echo $keywords;

echo '</br></br>';

//usage 3. changes the country
$hot->setCountry('au');
$keywords = $hot->get('json');
echo $keywords;

echo '</br></br>';

//usage 4. gets the random keyword
$random = $hot->randomPick();
echo $random;

echo '</br></br>';

//usage 5. Iterates the all country's hot trend keyworkds
// $countryArray = array('au','ca','hk','in','is','jp','ru','sg','tw','uk','us');
// $count = count($countryArray);

// for ($i = 0; $i < $count; $i++) {
//     $hot->setCountry($countryArray[$i]);
//     $keywords = $hot->get('json');
// 	echo $keywords;
//     echo '</br></br>';
// }


?>
