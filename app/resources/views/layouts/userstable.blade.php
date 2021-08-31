<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>N°</th>
            <th>Imagen de Perfil</th>
            <th>Nombre</th>
            <th>Correo electrónico</th>
            <th>Numero celular</th>
            <th>Fecha Creación</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($getusers as $users) {
        ?>
        <tr id="dataid{{$users->id}}">
            <td>{{$users->id}}</td>
            <td><img src='{!! asset("public/images/profile/".$users->profile_image) !!}' style="width: 100px;"></td>
            <td>{{$users->name}}</td>
            <td>{{$users->email}}</td>
            <td>{{$users->mobile}}</td>
            <td>{{$users->created_at}}</td>
            <td>
                @if($users->is_available == '1')
                    <a class="badge badge-info px-2" onclick="StatusUpdate('{{$users->id}}','2')" style="color: #fff;">Bloquear</a>
                @else
                    <a class="badge badge-primary px-2" onclick="StatusUpdate('{{$users->id}}','1')" style="color: #fff;">Desbloquear</a>
                @endif
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>