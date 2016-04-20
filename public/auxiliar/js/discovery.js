$(document).ready(function(){

  var
		report = $('.cd-item-info'),
		singleProjectContent = $('.cd-project-content');
  report.click(function(){
    discover_fields($(this));
		singleProjectContent.addClass('is-visible');
		$("#cd-gallery-items").css('display','none');
	});
  singleProjectContent.on('click', '.close', function(event){
		event.preventDefault();
		singleProjectContent.removeClass('is-visible');
		$("#cd-gallery-items").removeAttr('style');
	});
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
function discover_fields(repctrl){
  var file = repctrl.find('a').attr('id');
  $.ajax({
    url:'showfilters?file='+file,
    type:"GET",
    success:function(divhtml){
      console.log(divhtml);
      if(divhtml == "NOFILTERS"){
        var json_data = {filters:{},file:""};
        json_data.file = file;
        $.ajax({
          url:'showreport?filterdata='+ JSON.stringify(json_data),
          type:'GET',
          success:function(file){
            $("#divinforme").load(file);
            $(".informeheader").show();
            $(".informe").show();
          },
          error:function(xhr){
            console.log(xhr.statusText + xhr.responseText);
          }
        });
      }
      else{
        $(".filters").html(divhtml);
        $(".filters").fadeIn("slow");
      }
    },
    error:function(xhr){
      console.log(xhr.statusText + xhr.responseText);
    }
    });
}
$(document).on('click',"#create_report",function(){
  var json_data = {filters:{},file:""};
  var json_filters = {}
  var name = "";
  var file = $(".cd-item-info").find("a").attr("id");
  $(":input[id^='filter']").each(function(index){
    name = $(this).attr("id").substring(6);
    json_data.filters[name] = $(this).val();
  });
  json_data.file = file;
  $("#hdndata").val(JSON.stringify(json_data));
  $.ajax({
    url:'showreport?filterdata=' + JSON.stringify(json_data),
    type:'GET',
    success:function(file){
      $("#divinforme").load(file);
      $(".informeheader").show();
      $(".informe").show();
    },
    error:function(xhr){
      console.log(xhr.statusText + xhr.responseText);
    }
  });
});
