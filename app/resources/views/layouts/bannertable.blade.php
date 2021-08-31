<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>#</th>
            <th>Imagen</th>
            <th>Fecha creación</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($getbanner as $banner) {
        ?>
        <tr id="dataid{{$banner->id}}">
            <td>{{$banner->id}}</td>
            <td><img src='{!! asset("public/images/banner/".$banner->image) !!}' class='img-fluid' style='max-height: 50px;'></td>
            <td>{{$banner->created_at}}</td>
            <td>
                <span>
                    <a href="#" data-toggle="tooltip" data-placement="top" onclick="GetData('{{$banner->id}}')" title="" data-original-title="Editar">
                        <span class="badge badge-success">Editar</span>
                    </a>
                    <a href="#" data-toggle="tooltip" data-placement="top" onclick="DeleteData('{{$banner->id}}')" title="" data-original-title="Delete">
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