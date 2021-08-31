<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>N°</th>
            <th>Categoria</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>Tiempo de entrega (min)</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($getitem as $item) {
            // print_r($item);
        ?>
        <tr id="dataid{{$item->id}}">
            <td>{{$item->id}}</td>
            <td>{{@$item['category']->category_name}}</td>
            <td>{{$item->item_name}}</td>
            <td><?php echo env('CURRENCY').''.number_format($item->item_price, 2); ?></td>
            <td>{{$item->delivery_time}}</td>
            <td>
                <span>
                    <a href="#" data-toggle="tooltip" data-placement="top" onclick="GetData('{{$item->id}}')" title="" data-original-title="Editar">
                        <span class="badge badge-success">Editar</span>
                    </a>
                    <a data-toggle="tooltip" href="{{URL::to('admin/item-images/'.$item->id)}}" data-original-title="Ver">
                        <span class="badge badge-warning">Ver</span>
                    </a>
                    <a class="badge badge-danger px-2" onclick="StatusUpdate('{{$item->id}}','2')" style="color: #fff;">Eliminar</a>
                </span>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>