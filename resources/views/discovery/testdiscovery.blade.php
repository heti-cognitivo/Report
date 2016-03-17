<html>
<head>
  <script src="auxiliar/js/discovery.js"></script>
  <script src="auxiliar/js/jquery.min.2.1.3.js"></script>
  <script src="auxiliar/js/bootstrap.min.js"></script>
  <script src="auxiliar/js/typeahead.js"></script>
  <link href="{{ asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
  {{-- <link rel="stylesheet" type="text/css" href="auxiliar/css/bootstrap.min.css"> --}}
  <link rel="stylesheet" type="text/css" href="auxiliar/css/bootstrap.theme.min.css">
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
  <button type="button" id="btn_discover_fields" onclick="discover_fields();">Test Me!</button>
  <div id="divdiscoveredfields">
  </div>
</body>
</html>
