@extends('theme.default')

@section('content')


    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Categorias</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{count($getcategory)}}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-list-alt"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Productos</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{count($getitems)}}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-cutlery"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-9">
                    <div class="card-body">
                        <h3 class="card-title text-white">Extras</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{count($addons)}}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-plus"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Usuarios</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{count($getusers)}}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h3 class="card-title text-white">Pedidos</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{count($getorders)}}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-5">
                    <div class="card-body">
                        <h3 class="card-title text-white">Calificaciones y opiniones</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{count($getreview)}}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-star"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-6">
                    <div class="card-body">
                        <h3 class="card-title text-white">Códigos Promocionales</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{count($getpromocode)}}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-gift"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Repartidor</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{count($driver)}}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-car"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Contacto</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{count($contact)}}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-envelope"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-7">
                    <div class="card-body">
                        <h3 class="card-title text-white">Impuesto</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ number_format(Auth::user()->tax, 2) }}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-percent"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-8">
                    <div class="card-body">
                        <h3 class="card-title text-white">Impuestos</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?php echo env('CURRENCY'); ?>{{ number_format($order_tax, 2) }}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-calculator"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-9">
                    <div class="card-body">
                        <h3 class="card-title text-white">Ganancias</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?php echo env('CURRENCY'); ?>{{ number_format($order_total-$order_tax, 2) }}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-usd"></i></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pedidos de hoy</h4>
                        <div class="table-responsive" id="table-display">
                            @include('theme.todayorderstable')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form method="post" id="assign">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category_id" class="col-form-label">ID Pedido:</label>
                        <input type="text" class="form-control" id="bookId" name="bookId" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="category_id" class="col-form-label">Seleccione repartidor:</label>
                        <select class="form-control" name="driver_id" id="driver_id" required="">
                            <option value="">Select Driver</option>
                            @foreach ($getdriver as $driver)
                                <option value="{{$driver->id}}">{{$driver->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="assign()" data-dismiss="modal">Guardar</button>
                </div>
                </form>
            </div>

        </div>
    </div>
    <!-- #/ container -->
@endsection
@section('script')
<script type="text/javascript">
    $('.table').dataTable({
      aaSorting: [[0, 'DESC']]
    });
    function DeleteData(id) {
        swal({
            title: "¿Esta seguro?",
            text: "¿Esta seguro de eliminar el pedido ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Si, elimínelo!",
            cancelButtonText: "No, cancele por favor",
            closeOnConfirm: false,
            closeOnCancel: false,
            showLoaderOnConfirm: true,
        },
        function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:"{{ URL::to('admin/orders/destroy') }}",
                    data: {
                        id: id
                    },
                    method: 'POST',
                    success: function(response) {
                        if (response == 1) {
                            swal({
                                title: "'¡Aprobado!",
                                text: "El pedido fue cancelado.",
                                type: "success",
                                showCancelButton: true,
                                confirmButtonClass: "btn-danger",
                                confirmButtonText: "Ok",
                                closeOnConfirm: false,
                                showLoaderOnConfirm: true,
                            },
                            function(isConfirm) {
                                if (isConfirm) {
                                    $('#dataid'+id).remove();
                                    swal.close();
                                    // location.reload();
                                }
                            });
                        } else {
                            swal("Cancelado", "Algo salio mal :(", "error");
                        }
                    },
                    error: function(e) {
                        swal("Cancelado", "Algo salio mal :(", "error");
                    }
                });
            } else {
                swal("Cancelado", "Su registro es seguro:)", "error");
            }
        });
    }

    function StatusUpdate(id,status) {
        swal({
            title: "¿Está seguro?",
            text: "¿Quiere cambiar el estado?",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Si, hágalo!",
            cancelButtonText: "No, cancele por favor",
            closeOnConfirm: false,
            closeOnCancel: false,
            showLoaderOnConfirm: true,
        },
        function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:"{{ URL::to('admin/orders/update') }}",
                    data: {
                        id: id,
                        status: status
                    },
                    method: 'POST', //Post method,
                    dataType: 'json',
                    success: function(response) {
                        swal({
                            title: "'¡Aprobado!",
                            text: "'El estado ha sido actualizado",
                            type: "success",
                            showCancelButton: true,
                            confirmButtonClass: "btn-danger",
                            confirmButtonText: "Ok",
                            closeOnConfirm: false,
                            showLoaderOnConfirm: true,
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                swal.close();
                                location.reload();
                            }
                        });
                    },
                    error: function(e) {
                        swal("Cancelado", "Algo salio mal :(", "error");
                    }
                });
            } else {
                swal("Cancelado", "Algo salio mal :)", "error");
            }
        });
    }

    $(document).on("click", ".open-AddBookDialog", function () {
         var myBookId = $(this).data('id');
         $(".modal-body #bookId").val( myBookId );
    });

    function assign(){     
        var bookId=$("#bookId").val();
        var driver_id = $('#driver_id').val();
        var CSRF_TOKEN = $('input[name="_token"]').val();
        $('#preloader').show();
        $.ajax({
            headers: {
                'X-CSRF-Token': CSRF_TOKEN 
            },
            url:"{{ URL::to('admin/orders/assign') }}",
            method:'POST',
            data:{'bookId':bookId,'driver_id':driver_id},
            dataType:"json",
            success:function(data){
                $('#preloader').hide();
                if (data == 1) {
                    location.reload();
                }
            },error:function(data){
               
            }
        });
    }
</script>
@endsection