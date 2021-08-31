<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>N°</th>
            <th>Usuario</th>
            <th>N° Pedido</th>
            <th>Dirección</th>
            <th>Tipo de pago</th>
            <th>ID Pago</th>
            <th>Tipo de pedido</th>
            <th>Estado de pedido</th>
            <th>Asignar pedido a</th>
            <th>Fecha creación</th>
            <th>Cambiar estado de pedido</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($getorders as $orders) {
        ?>
        <tr id="dataid{{$orders->id}}">
            <td>{{$i}}</td>
            <td>{{$orders['users']->name}}</td>
            <td>{{$orders->order_number}}</td>
            <td>{{$orders->address}}</td>
            <td>
                @if($orders->payment_type =='0')
                      COD
                @else
                      Online
                @endif
            </td>
            <td>
                @if($orders->razorpay_payment_id == '')
                    --
                @else
                    {{$orders->razorpay_payment_id}}
                @endif
            </td>
            <td>
                @if($orders->order_type == 1)
                    Delivery
                @else
                    Recoger
                @endif
            </td>
            <td>
                @if($orders->status == '1')
                    Pedido recibido
                @elseif ($orders->status == '2')
                    En camino
                @elseif ($orders->status == '3')
                    Assigned to Driver
                @elseif ($orders->status == '4')
                    Entregada
                @else
                    Cancelado
                @endif
            </td>
            <td>
                @if ($orders->name == "")
                    --
                @else
                    {{$orders->name}}
                @endif
            </td>
            <td>{{$orders->created_at}}</td>
            <td>
                @if($orders->status == '1')
                    <a ddata-toggle="tooltip" data-placement="top" onclick="StatusUpdate('{{$orders->id}}','2')" title="" data-original-title="Order Received">
                        <span class="badge badge-secondary px-2" style="color: #fff;">Pedido Recibido</span>
                    </a>
                @elseif ($orders->status == '2')
                    @if ($orders->order_type == '2')
                        <a class="badge badge-primary px-2" onclick="StatusUpdate('{{$orders->id}}','4')" style="color: #fff;">Recoger</a>
                    @else
                        <a class="open-AddBookDialog badge badge-primary px-2" data-toggle="modal" data-id="{{$orders->id}}" data-target="#myModal" style="color: #fff;">Asignar repartidor</a>
                    @endif
                @elseif ($orders->status == '3')
                    <a ddata-toggle="tooltip" data-placement="top" title="" data-original-title="Out for Delivery">
                        <span class="badge badge-success px-2" style="color: #fff;">Asignar repartidor</span>
                    </a>
                @elseif ($orders->status == '4')
                    <a ddata-toggle="tooltip" data-placement="top" title="" data-original-title="Out for Delivery">
                        <span class="badge badge-success px-2" style="color: #fff;">Entregado</span>
                    </a>
                @else
                    <span class="badge badge-danger px-2">Cancelado</span>
                @endif
            </td>
            <td>
                <span>
                    <a data-toggle="tooltip" href="{{URL::to('admin/invoice/'.$orders->id)}}" data-original-title="Ver">
                        <span class="badge badge-warning">Ver</span>
                    </a>
                </span>
            </td>
        </tr>
        <?php
        $i++;
        }
        ?>
    </tbody>
</table>