@extends('../layouts.master1')
@section('resources')
    <script src="auxiliar/js/jquery.min.2.1.3.js"></script>
    <script src="auxiliar/js/discovery.js"></script>
    <script src="auxiliar/js/typeahead.js"></script>
@endsection
@section('title', 'Reportes')
@section('Title', 'Reportes')

@section('page-content-inner')
  @foreach ($filelist as $file)
    <a href="javascript:void(0);" class="report" id="{{$file}}">
    <div style="float:left;margin:5px 5px 5px 5px">
      <div>
        <img src="{{url()}}/assets/global/img/report.png" class="img-circle" alt=""/>
      </div>
      <h4 style="text-align:center">{{$file}}</h4>
    </div>
  </a>
  @endforeach
@endsection
<div id="filters"></div>
