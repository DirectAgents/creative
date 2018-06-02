<?php

 session_start();
 include_once("../config.php");
 require_once '../base_path.php'; 


require_once('../algoliasearch-client-php-master/algoliasearch.php');


//Upload to algolia
$client = new \AlgoliaSearch\Client("F3O2TAOV5W", "a48a018178dec80cadba88cee14f169b");
$index = $client->initIndex('startups');

$index->deleteObject('64');


?>