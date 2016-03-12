<html>
<head>
<style>
.container {
    display: table;
    width: 100%;
    }

  .row  {
    display: table-row;
    }

  .cell {
    display: table-cell;
    }
</style>
</head>
<body>
  <div id='allfilters'>
    @foreach ($table_columns as $table=>$columns)
      <div id='{{$table}}' class='container'>

          <p> {{$table}} </p>
        @foreach($columns as $key=>$col)
        <div class='row'>
          <div class='cell' style="width:15%">
            <p>{{$col->column_name}}</p>
          </div>
          @if($col->data_type == "TEXT")
            <div class='cell' style="width:85%">
              <input id='{{$col->column_name}}' type='text' size='10'/>
            </div>
          @elseif($col->data_type == "NUMERIC")
            <div class='cell' style="width:85%">
              <input id='{{$col->column_name}}' type='text' size='10'/>
            </div>
          @elseif($col->data_type == "CHECKBOX")
            <div class='cell' style="width:85%">
              <input id='{{$col->column_name}}' type='text' size='10'/>
            </div>
          @elseif($col->data_type == "DATE")
            <div class='cell' style="width:85%">
              <input id='{{$col->column_name}}' type='text' size='10'/>
            </div>
          @endif
         </div>
        @endforeach
      </div>
    @endforeach
  </div>
</body>
</html>
