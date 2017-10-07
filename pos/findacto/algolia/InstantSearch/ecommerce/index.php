<?php

// if you are not using composer
require_once('../../algoliasearch-client-php-master/algoliasearch.php');


$client = new \AlgoliaSearch\Client("F3O2TAOV5W", "a48a018178dec80cadba88cee14f169b");

$index = $client->initIndex('your_index_name');


$index->setSettings(array(
  "searchableAttributes" => [
    "brand",
    "name",
    "categories",
    "unordered(description)"
  ],
  "customRanking" => [
    "desc(popularity)"
  ]
));


//$batch = json_decode(file_get_contents('bestbuy_light.json'), true);
//$index->addObjects($batch);





?>


<!doctype html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <header>
    <div>
       <input id="search-input">
       <!-- We use a specific placeholder in the input to guides users in their search. -->
    </div>
  </header>
  <main>
      <div id="price"></div>
      <div id="brands"></div>
      <div id="hits"></div>
      <div id="pagination"></div>


<script type="text/html" id="hit-template">
  <div class="hit">
    <div class="hit-image">
      <img src="{{image}}" alt="{{name}}">
    </div>
    <div class="hit-content">
      <h3 class="hit-price">${{price}}</h3>
      <h2 class="hit-name">{{{_highlightResult.name.value}}}</h2>
      <p class="hit-description">{{{_highlightResult.description.value}}}</p>
    </div>
  </div>
</script>



  </main>
  <script src="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.js"></script>
  <script src="app.js"></script>
</body>
