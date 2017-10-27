var search = instantsearch({
  appId: "F3O2TAOV5W",
  apiKey: '5d10153d5309d83a8ac03981d28f2a56',
  indexName: 'cto',
  urlSync: true
});








search.addWidget(
  instantsearch.widgets.searchBox({
    container: '#search-input',
    placeholder: 'Search for actors'
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
  instantsearch.widgets.refinementList({
    container: '#categories',
    attributeName: 'category',
    operator: 'or',
    limit: 10,
    templates: {
      header: 'Programming Skills'
    }
  })
);





search.addWidget(
  instantsearch.widgets.refinementList({
    container: '#lookingfor',
    attributeName: 'lookingfor',
    operator: 'or',
    limit: 10,
    templates: {
      header: 'Looking for a:'
    }
  })
);


search.addWidget(
  instantsearch.widgets.refinementList({
    container: '#skills',
    attributeName: 'skills',
    operator: 'and',
    limit: 10,
    templates: {
      header: 'Skills Required:',
    }
  })
);


search.addWidget(
  instantsearch.widgets.pagination({
    container: '#pagination'
  })
);











search.start();

