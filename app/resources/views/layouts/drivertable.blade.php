<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>#</th>
            <th>Imagen de perfil</th>
            <th>Nombre</th>
            <th>Correo electrónico</th>
            <th>Celular</th>
            <th>Fecha creación</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($getdriver as $driver)
        <tr id="dataid{{$driver->id}}">
            <td>{{$driver->id}}</td>
            <td><img src='{!! asset("public/images/profile/".$driver->profile_image) !!}' style="width: 100px;"></td>
            <td>{{$driver->name}}</td>
            <td>{{$driver->email}}</td>
            <td>{{$driver->mobile}}</td>
            <td>{{$driver->created_at}}</td>
            <td>
                <a href="#" data-toggle="tooltip" data-placement="top" onclick="GetData('{{$driver->id}}')" title="" data-original-title="Editar">
                    <span class="badge badge-success">Editar</span>
                </a>
                @if($driver->is_available == '1')
                    <a class="badge badge-info px-2" onclick="StatusUpdate('{{$driver->id}}','2')" style="color: #fff;">Bloquear</a>
                @else
                    <a class="badge badge-primary px-2" onclick="StatusUpdate('{{$driver->id}}','1')" style="color: #fff;">Desbloquear</a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>