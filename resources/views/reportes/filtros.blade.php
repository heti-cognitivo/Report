
<div class="portlet-body form">
<form method="post" action="{{url()}}/crear_filtros" class="form-horizontal">
    <div class="form-body">
        {!! csrf_field() !!}
        <div class="form-group">
        <label for="single" class="control-label">Empresas</label>
        <select id="select_empresa" name="select_empresa" class="form-control select2">
            @foreach($empresas as $item)
                <option value="{{$item->id_company}}">{{$item->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="single" class="control-label">Sucursales</label>
        <select id="select_sucursal" name="select_sucursal" class="form-control select2">
            @foreach($sucursales as $item)
                <option value="{{$item->id_branch}}">{{$item->name}}</option>
            @endforeach

        </select>
    </div>

    <div class="form-group">
        <label for="single" class="control-label">Fecha Inicio</label>
        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio">
    </div>
    <div class="form-group">
        <label for="single" class="control-label">Fecha Fin</label>
        <input type="date" class="form-control" id="fecha_fin" name="fecha_fin">
    </div>

        <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn green">Generar Filtros</button>

        </div>

    </div>
</form>

</div>