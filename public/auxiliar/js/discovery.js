
function addtypeahead(controlid) {
        var control = $("#input"+controlid);
        var column = $(control).parent().prev().attr("id");
        var table = $(control).closest(".container").attr("id");
          var response = new Bloodhound({
                                datumTokenizer: Bloodhound.tokenizers.whitespace,
                                queryTokenizer: Bloodhound.tokenizers.whitespace,
                                prefetch:'getfilterdata?table=' + table + '&column=' + column
                             });
        $(control).typeahead({
          hint: true,
          highlight: true,
          minLength: 1
        },
        {
          name: 'name',
          source: response
        });
      }
function discover_fields(report_id){
  report_id=1;
  $.get('discoverfields?reportid='+report_id.toString(),function(divhtml){
    $('#divdiscoveredfields').html(divhtml)
  });
}
