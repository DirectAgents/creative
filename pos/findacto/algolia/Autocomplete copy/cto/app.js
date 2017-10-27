var client = algoliasearch('F3O2TAOV5W', '5d10153d5309d83a8ac03981d28f2a56');
var developers = client.initIndex('developers');
var skills = client.initIndex('skills');

autocomplete(
  '#aa-search-input',
  {
    debug: true,
    templates: {
      dropdownMenu:
        '<div class="aa-dataset-player"></div>' +
        '<div class="aa-dataset-team"></div>',
    },
  },
  [
    {
      source: autocomplete.sources.hits(developers, {hitsPerPage: 7}),
      displayKey: 'name',
      name: 'developer',
      templates: {
        header: '<div class="aa-suggestions-category">Person</div>',
        suggestion: function(suggestion) {

          var str = '<span>' +
           suggestion._highlightResult.name.value +
            '</span>';
        for (var i = 0, len = suggestion._highlightResult.skills.length; i < len; i++) {
          str = str +
            
             suggestion._highlightResult.skills[i].value + ' '
            
          ;
        }
        
        return str;

        

          

          
        },
        empty: '<div class="aa-empty">No matching person found</div>',
      },
    },
    {
      source: autocomplete.sources.hits(skills, {hitsPerPage: 5}),
      displayKey: 'name',
      name: 'name',
      templates: {
        header: '<div class="aa-suggestions-category">Skills</div>',
        suggestion: function(suggestion) {




          return (
            '<img src="' +
            suggestion.logoUrl +
            '">' +
            '<div><span>' +
            suggestion._highlightResult.name.value +
            '</span><span>' 
          );
        },
        empty: '<div class="aa-empty">No matching teams</div>',
      },
    },
  ]
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
