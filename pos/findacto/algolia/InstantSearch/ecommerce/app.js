var search = instantsearch({
  // Replace with your own values
  appId: 'latency',
  apiKey: '6be0576ff61c053d5f9a3225e2a90f76', // search only API key, no ADMIN key
  indexName: 'instant_search',
  urlSync: true
});


search.addWidget(
  instantsearch.widgets.searchBox({
    container: '#search-input',
    placeholder: 'Search for products...'
  })
);


search.addWidget(
  instantsearch.widgets.hits({
    container: '#hits',
    hitsPerPage: 10,
    templates: {
      item: document.getElementById('hit-template').innerHTML,
      empty: "We didn't find any results for the search <em>\"{{query}}\"</em>"
    }
  })
);


search.addWidget(
  instantsearch.widgets.pagination({
    container: '#pagination'
  })
);


search.addWidget(
  instantsearch.widgets.refinementList({
    container: '#brands',
    attributeName: 'brand',
    operator: 'or',
    limit: 10,
    templates: {
      header: 'Brands'
    }
  })
);


search.addWidget(
  instantsearch.widgets.rangeSlider({
    container: '#price',
    attributeName: 'price',
    templates: {
      header: 'Price'
    },
    tooltips: {
      format: function(rawValue) {
        return '$' + Math.round(rawValue).toLocaleString();
      }
    }
  })
);






search.start();
