<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>#</th>
            <th>Categoria</th>
            <th>Producto</th>
            <th>Complemento</th>
            <th>Precio</th>
            <th>Fecha creación</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($getaddons as $addons) {
        ?>
        <tr id="dataid{{$addons->id}}">
            <td>{{$addons->id}}</td>
            <td>{{$addons['category']->category_name}}</td>
            <td>{{$addons['item']->item_name}}</td>
            <td>{{$addons->name}}</td>
            <td><?php echo env('CURRENCY').''.number_format($addons->price, 2); ?></td>
            <td>{{$addons->created_at}}</td>
            <td>
                <span>
                    <a href="#" data-toggle="tooltip" data-placement="top" onclick="GetData('{{$addons->id}}')" title="" data-original-title="Editar">
                        <span class="badge badge-success">Editar</span>
                    </a>
                    <a class="badge badge-danger px-2" onclick="StatusUpdate('{{$addons->id}}','2')" style="color: #fff;">Eliminar</a>
                </span>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>