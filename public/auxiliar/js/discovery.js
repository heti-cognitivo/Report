$(document).ready(function(){
  $('.report').click(function(event){
    discover_fields($(this),event);
  })
});
function addtypeahead(controlid) {
        var control = $('#filter' + controlid);
        var table_col_name = $('#hdn' + controlid).val();
          var response = new Bloodhound({
                                datumTokenizer: Bloodhound.tokenizers.whitespace,
                                queryTokenizer: Bloodhound.tokenizers.whitespace,
                                prefetch:'getfilterdata?table_col=' + table_col_name
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
function discover_fields(repctrl,event){
  var file = repctrl[0].getAttribute('id');
  $.ajax({
    url:'showfilters?file='+file,
    type:"GET",
    success:function(divhtml){
      var divfilters = $(repctrl).parent().next(".filters");
      $(divfilters).html(divhtml);
      $(divfilters).fadeTo(1200,1);
    },
    error:function(xhr){
      console.log(xhr.statusText + xhr.responseText);
    }
    });
}
$(document).on('submit',"#form_filters",function(){
  var json_data = {filters:{},file:""};
  var json_filters = {}
  var name = "";
  var file = $(".report").attr("id");
  $(":input[id^='filter']").each(function(index){
    name = $(this).attr("id").substring(6);
    json_data.filters[name] = $(this).val();
  });
  json_data.file = file;
  $("#hdndata").val(JSON.stringify(json_data));
  alert($("#hdndata").val());
});
