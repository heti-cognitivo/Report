<h3 class="list-heading">Filtros</h3>
<div class="portlet-body form">
  <!-- <form target="_blank" action="{{url()}}/showreport" id="form_filters" name="filters" class="form-horizontal"> -->
    <div class="portlet-body form">
        {!! csrf_field() !!}
        @foreach ($parameter_details as $name=>$detail)
          <div class="form-group">
            <label for="single" class="control-label">{{$name}}</label>
            @if($detail["type"] == "TEXT" || $detail["type"] == "NUMBER")
              <input class="typeahead" id="filter{{$name}}" type="text" size="10"/>
              <input type="hidden" id="hdn{{$name}}" value="{{$detail["tablecol"]}}"></input>
              <input type="hidden" id="hdnfile{{$name}}" value="{{$file}}"></input>
              <script>
                $(document).ajaxStop(function () {
                  addtypeahead('{{$name}}');
                });
                </script>
            @endif
          </div>
        @endforeach

        <input type="hidden" id="hdndata" name="filterdata" value=""></input>
        <div class="col-md-offset-3 col-md-9">
            <button class="btn green" name="submit_form" id="create_report">Generar Reportes</button>
        </div>
</div>
<!-- </form> -->
