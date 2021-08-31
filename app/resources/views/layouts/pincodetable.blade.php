<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>N°</th>
            <th>Código de ubicación</th>
            <th>Fecha creación</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($getpincode as $pincode) {
        ?>
        <tr id="dataid{{$pincode->id}}">
            <td>{{$pincode->id}}</td>
            <td>{{$pincode->pincode}}</td>
            <td>{{$pincode->created_at}}</td>
            <td>
                <span>
                    <a href="#" data-toggle="tooltip" data-placement="top" onclick="GetData('{{$pincode->id}}')" title="" data-original-title="Editar">
                        <span class="badge badge-success">Editar</span>
                    </a>
                    <a href="#" data-toggle="tooltip" data-placement="top" onclick="DeleteData('{{$pincode->id}}')" title="" data-original-title="Delete">
                        <span class="badge badge-danger">Eliminar</span>
                    </a>
                </span>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>