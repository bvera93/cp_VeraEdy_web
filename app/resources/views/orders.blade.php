@extends('theme.default')

@section('content')

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/admin/home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Pedidos</a></li>
        </ol>
    </div>
</div>
<!-- row -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Todos los pedidos</h4>
                    <div class="table-responsive" id="table-display">
                        @include('theme.orderstable')
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
                    <label for="category_id" class="col-form-label">Seleccionar repartidor:</label>
                    <select class="form-control" name="driver_id" id="driver_id" required="">
                        <option value="">Seleccionar repartidor</option>
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
            title: "¿Está seguro?",
            text: "¿Está seguro de eliminar este pedido??",
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
                swal("Cancelado", "Your record is safe :)", "error");
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