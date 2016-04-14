<h3 class="list-heading">Filtros</h3>
<div class="portlet-body form">
  <form target="_blank" action="{{url()}}/showreport" id="form_filters" name="filters" class="form-horizontal">
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
            <button class="btn green" type="submit" name="submit_form" id="create_report">Generar Reportes</button>
        </div>
</div>
</form>


  {{-- <div id='allfilters'>
    @foreach ($table_columns as $table=>$columns)
      <div id='{{$table}}' class='container'>

          <p> {{$table}} </p>
        @foreach($columns as $key=>$col)
        <div class='row'>
          <div class='cell' id='{{$col->column_name}}' style="width:15%">
            <p>{{$col->column_name}}</p>
          </div>
          @if($col->data_type == "TEXT")
            <div class='cell' style="width:85%">
              <input class="typeahead" id='input{{$table}}{{$col->column_name}}' type='text' size='10'/>
            </div>
            <script>
              $(document).ready(function () {
                addtypeahead('{{$table}}{{$col->column_name}}');
              });
              </script>
          @elseif($col->data_type == "NUMERIC")
            <div class='cell' style="width:85%">
              <input class="typeahead" id='input{{$table}}{{$col->column_name}}' type='text' size='10'/>
            </div>
            <script>$(document).ready(function () {
              addtypeahead('{{$table}}{{$col->column_name}}');
            });</script>
          @elseif($col->data_type == "CHECKBOX")
            <div class='cell' style="width:85%">
              <input id='input{{$table}}{{$col->column_name}}' type='checkbox' size='10'/>
            </div>
          @elseif($col->data_type == "DATE")
            <div class='cell' style="width:85%">
              <input id='input{{$table}}{{$col->column_name}}' type='datetime' size='10'/>
            </div>
          @endif
         </div>
        @endforeach
      </div>
    @endforeach
  </div> --}}
