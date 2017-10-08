<?php

require_once('../../algoliasearch-client-php-master/algoliasearch.php');


$client = new \AlgoliaSearch\Client("F3O2TAOV5W", "a48a018178dec80cadba88cee14f169b");
$index = $client->initIndex('cto');

$records = json_decode(file_get_contents('cto.json'), true);

$chunks = array_chunk($records, 1000);

foreach ($chunks as $batch) {
  $index->addObjects($batch);
}



?>