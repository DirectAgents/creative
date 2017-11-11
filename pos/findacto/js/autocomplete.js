var client = algoliasearch('F3O2TAOV5W', '5d10153d5309d83a8ac03981d28f2a56');
//var developers = client.initIndex('developers');
//var skills = client.initIndex('skills');

var developers = client.initIndex('developers');
var skills = client.initIndex('skills');


autocomplete(
  '.algolia-autocomplete',
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
      name: 'name',
      templates: {
        header: '<div class="aa-suggestions-category">Person</div>',
        suggestion: function(suggestion) {

          

          var str = '<a href="http://localhost/creative/pos/findacto/profile/'+suggestion.profileid+'">' + '<span><img src="'+suggestion.profileimage +'"></span>' +  '<span class="aa-suggestion-name">' + suggestion._highlightResult.name.value + '</span>' + 
          '<span class="aa-suggestion-location">' + suggestion._highlightResult.location.value + '</span>' + '</a>';
          
        /*for (var i = 0, len = suggestion._highlightResult.skills.length; i < len; i++) {
          str = str +
            
             suggestion._highlightResult.skills[i].value + ' '
            
          ;
        }*/

        return str;

        },
        empty: '<div class="aa-empty">No matching person found</div>',
      },
    },
    {
      source: autocomplete.sources.hits(developers, {hitsPerPage: 5}),
      displayKey: 'skills',
      name: 'skills',
      templates: {
        header: '<div class="aa-suggestions-category">Skills</div>',
        suggestion: function(suggestion) {

          var str = '<span>' +
          
            '</span>';

            for (var i = 0, len = suggestion._highlightResult.skills.length; i < len; i++) {
          str = str +
            
             '<a href="http://localhost/creative/pos/findacto/?q='+ suggestion._highlightResult.skills[i].value + '">' + suggestion._highlightResult.skills[i].value +  '</a>'
            
          ;
        }

         //return str;
          //var str = '<a href="http://localhost/creative/pos/findacto/?q='+ suggestion._highlightResult.skills.value + '">' 
          //+  '<span class="aa-suggestion-name">' + suggestion._highlightResult.skills.value  + '</span>' + '</a>';
          
       
        var em = str.replace("<em>",'');
        var strfinal = em.replace("</em>",'');



        return strfinal;

        },
        empty: '<div class="aa-empty">No matching skills</div>',
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
