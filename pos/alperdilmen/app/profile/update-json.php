<?php

require_once('../algoliasearch-client-php-master/algoliasearch.php');

//Update JSON File
$jsonString = file_get_contents('startups.json');
$data = json_decode($jsonString, true);

// or if you want to change all entries with activity_code "1"
foreach ($data as $key => $entry) {
    if ($entry['objectID'] == '15') {
        $data[$key]['name'] = "TENNIS22";
    }
}

$newJsonString = json_encode($data);
file_put_contents('startups.json', $newJsonString);


//Upload to algolia
$client = new \AlgoliaSearch\Client("F3O2TAOV5W", "a48a018178dec80cadba88cee14f169b");
$index = $client->initIndex('startups');

$records = json_decode(file_get_contents('startups.json'), true);

$chunks = array_chunk($records, 1000);

foreach ($chunks as $batch) {
  $index->addObjects($batch);
}

?>