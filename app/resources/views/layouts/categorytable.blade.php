<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>#</th>
            <th>Imagen</th>
            <th>Categoria</th>
            <th>Fecha creación</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($getcategory as $category) {
        ?>
        <tr id="dataid{{$category->id}}">
            <td>{{$category->id}}</td>
            <td><img src='{!! asset("public/images/category/".$category->image) !!}' class='img-fluid' style='max-height: 50px;'></td>
            <td>{{$category->category_name}}</td>
            <td>{{$category->created_at}}</td>
            <td>
                <span>
                    <a href="#" data-toggle="tooltip" data-placement="top" onclick="GetData('{{$category->id}}')" title="" data-original-title="Editar">
                        <span class="badge badge-success">Editar</span>
                    </a>
                    @if($category->is_available == '1')
                        <a class="badge badge-info px-2" onclick="StatusUpdate('{{$category->id}}','2')" style="color: #fff;">Eliminar</a>
                    @else
                        <a class="badge badge-primary px-2" onclick="StatusUpdate('{{$category->id}}','1')" style="color: #fff;">No disponible</a>
                    @endif
                </span>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>