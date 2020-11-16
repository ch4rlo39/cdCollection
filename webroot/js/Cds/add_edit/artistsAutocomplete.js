(function ($) {
    var autoCompleteSource = urlToAutocompleteAction;
    $('#autocomplete').autocomplete({
       source: autoCompleteSource,
       minLength: 1
       ,
       focus: function(event, ui){
           $("#artist-id").val(ui.item.value);
           $("#autocomplete").val(ui.item.label);
           return false;
       },
       select: function (event, ui) {
           $("#artist-id").val(ui.item.value);
           $("#autocomplete").val(ui.item.label);
           return false;
       }
    }); 
})(jQuery);