<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>N°</th>
            <th>Image</th>
            <th>Slider Title</th>
            <th>Description</th>
            <th>Created at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($getslider as $slider) {
        ?>
        <tr id="dataid{{$slider->id}}">
            <td>{{$slider->id}}</td>
            <td><img src='{!! asset("public/images/slider/".$slider->image) !!}' class='img-fluid' style='max-height: 50px;'></td>
            <td>{{$slider->title}}</td>
            <td>{{$slider->description}}</td>
            <td>{{$slider->created_at}}</td>
            <td>
                <span>
                    <a href="#" data-toggle="tooltip" data-placement="top" onclick="GetData('{{$slider->id}}')" title="" data-original-title="Editar">
                        <span class="badge badge-success">Editar</span>
                    </a>
                    <a href="#" data-toggle="tooltip" data-placement="top" onclick="DeleteData('{{$slider->id}}')" title="" data-original-title="Delete">
                        <span class="badge badge-danger">Delete</span>
                    </a>
                </span>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>