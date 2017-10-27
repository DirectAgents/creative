var client = algoliasearch('F3O2TAOV5W', '5d10153d5309d83a8ac03981d28f2a56');
var players = client.initIndex('nba-players');
var teams = client.initIndex('nba-teams');

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
      source: autocomplete.sources.hits(players, {hitsPerPage: 7}),
      displayKey: 'name',
      name: 'player',
      templates: {
        header: '<div class="aa-suggestions-category">Players</div>',
        suggestion: function(suggestion) {
          return (
            '<span>' +
            suggestion._highlightResult.name.value +
            '</span><span>' +
            suggestion._highlightResult.team.value +
            '</span>'
          );
        },
        empty: '<div class="aa-empty">No matching players</div>',
      },
    },
    {
      source: autocomplete.sources.hits(teams, {hitsPerPage: 5}),
      displayKey: 'name',
      name: 'team',
      templates: {
        header: '<div class="aa-suggestions-category">Teams</div>',
        suggestion: function(suggestion) {
          return (
            '<img src="' +
            suggestion.logoUrl +
            '">' +
            '<div><span>' +
            suggestion._highlightResult.name.value +
            '</span><span>' +
            suggestion._highlightResult.location.value +
            '</span></div>'
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
