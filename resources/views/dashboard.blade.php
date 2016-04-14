@extends('../layouts.master1')
@section('resources')
    <script src="auxiliar/js/jquery.min.2.1.3.js"></script>
    <script src="auxiliar/js/discovery.js"></script>
@endsection
@section('title', 'Reportes')
@section('Title', 'Reportes')

@section('page-content-inner')
  @foreach ($filelist as $file)
    <div style="float:left;margin:5px 5px 5px 5px;position:relative">
    <a href="javascript:void(0);" class="report" id="{{$file}}">
      <div>
        <img src="{{url()}}/assets/global/img/report.png" class="img-circle" alt=""/>
      </div>
      <h4 style="text-align:center">{{$file}}</h4>
  </a>
</div>
  <div class="filters" style="opacity:0;position:relative;clear:left"></div>
  @endforeach
@endsection
