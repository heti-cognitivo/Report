@extends('../layouts.master1')

@section('title', 'Reportes')
@section('Title', 'Reportes')

@section('page-content-inner')
  @foreach ($filelist as $file)
    <a href="{{url()}}/showfilters?file={{$file}}">
    <div style="float:left;margin:5px 5px 5px 5px">
      <div>
        <img src="{{url()}}/assets/global/img/report.png" class="img-circle" alt=""/>
      </div>
      <h4 style="text-align:center">{{$file}}</h4>
    </div>
  </a>



  @endforeach
@endsection
