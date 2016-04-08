$(document).ready(function(){
  $('.report').click(function(event){
    discover_fields($(this),event);
  })
});
function addtypeahead(controlid) {
        var control = $("#input"+controlid);
        console.log(control);
        // var column = $(control).parent().prev().attr("id");
        // var table = $(control).closest(".container").attr("id");
        //   var response = new Bloodhound({
        //                         datumTokenizer: Bloodhound.tokenizers.whitespace,
        //                         queryTokenizer: Bloodhound.tokenizers.whitespace,
        //                         prefetch:'getfilterdata?table=' + table + '&column=' + column
        //                      });
        // $(control).typeahead({
        //   hint: true,
        //   highlight: true,
        //   minLength: 1
        // },
        // {
        //   name: 'name',
        //   source: response
        // });
      }
function discover_fields(repctrl,event){
  var file = repctrl[0].getAttribute('id');
  $.get('showfilters?file='+file,function(divhtml){
    $('#filters').css({position:"absolute",top:event.pageY,left:event.pageX});
    $('#filters').html(divhtml);
  });
}
