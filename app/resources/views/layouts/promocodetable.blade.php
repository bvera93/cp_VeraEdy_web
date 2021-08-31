<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>N°</th>
            <th>Promoción</th>
            <th>Código promocional</th>
            <th>Porcentaje de promo(%) </th>
            <th>Descripción </th>
            <th>Fecha creación</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($getpromocode as $promocode) {
        ?>
        <tr id="dataid{{$promocode->id}}">
            <td>{{$promocode->id}}</td>
            <td>{{$promocode->offer_name}}</td>
            <td>{{$promocode->offer_code}}</td>
            <td>{{$promocode->offer_amount}}</td>
            <td>{{$promocode->description}}</td>
            <td>{{$promocode->created_at}}</td>
            <td>
                <span>
                    <a href="#" data-toggle="tooltip" data-placement="top" onclick="GetData('{{$promocode->id}}')" title="" data-original-title="Editar">
                        <span class="badge badge-success">Editar</span>
                    </a>
                    <a class="badge badge-danger px-2" onclick="StatusUpdate('{{$promocode->id}}','2')" style="color: #fff;">Delete</a>
                </span>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>