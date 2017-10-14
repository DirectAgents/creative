<?php

// if you are not using composer
require_once('../../algoliasearch-client-php-master/algoliasearch.php');


$client = new \AlgoliaSearch\Client("F3O2TAOV5W", "a48a018178dec80cadba88cee14f169b");

$index = $client->initIndex('cto2');



$index->setSettings(array(
  "searchableAttributes" => [
    
    "name",
    "category"
  ]
));


//$batch = json_decode(file_get_contents('actors.json'), true);
//$index->addObjects($batch);



?>


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.css">


<body>
  <header>
    <div>
       <input type="text" id="search-input" />
       <!-- We use a specific placeholder in the input to guides users in their search. -->
    </div>
  </header>
  <main>


<div id="categories"></div>
<div id="hits"></div>

<script type="text/html" id="hit-template">
  <div class="hit">
   
    <div class="hit-content">
    
      <h2 class="hit-name"><a href="#">{{{_highlightResult.name.value}}}</a></h2>
    
    </div>
  </div>
</script>

</main>


<script src="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.js"></script>
  <script src="app.js"></script>

</body>  
