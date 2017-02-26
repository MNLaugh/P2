function searchAutoComplete(serched){
    var term = serched.value;
    $.ajax({
        method: "POST",
        url: "ctrl/ctrl.ajaxSearch.php",
        data: { keyword: term },
        success : function(response, statut){
            response = JSON.parse(response);
            $('#search').autocomplete({
                source : response
            });
        }
    });
}