@extends('theme.default')

@section('content')

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/admin/home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Codigo de ubicación</a></li>
        </ol>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPincode" data-whatever="@addPincode">Agregar código de ubicación</button>
        <!-- Add Pincode -->
        <div class="modal fade" id="addPincode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agrear nuevo código de ubicación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <form id="add_pincode">
                    <div class="modal-body">
                        <span id="msg"></span>
                        @csrf
                        <div class="form-group">
                            <label for="pincode" class="col-form-label">Código de ubicación:</label>
                            <input type="text" class="form-control" name="pincode" id="pincode">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Pincode -->
        <div class="modal fade" id="EditPincode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabeledit" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="post" name="editpincode" class="editpincode" id="editpincode">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabeledit">Editar código de ubicación</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <span id="emsg"></span>
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="id" name="id">
                            <div class="form-group">
                                <label for="getpincode" class="col-form-label">Código de ubicación:</label>
                                <input type="text" class="form-control" name="pincode" id="getpincode">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <span id="message"></span>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Todos los código de ubicación</h4>
                    <div class="table-responsive" id="table-display">
                        @include('theme.pincodetable')
                    </div>
                </div>
            </div>
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
$(document).ready(function() {
     
    $('#add_pincode').on('submit', function(event){
        event.preventDefault();
        var form_data = new FormData(this);
        $.ajax({
            url:"{{ URL::to('admin/pincode/store') }}",
            method:"POST",
            data:form_data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(result) {
                var msg = '';
                if(result.error.length > 0)
                {
                    for(var count = 0; count < result.error.length; count++)
                    {
                        msg += '<div class="alert alert-danger">'+result.error[count]+'</div>';
                    }
                    $('#msg').html(msg);
                    setTimeout(function(){
                      $('#msg').html('');
                    }, 5000);
                }
                else
                {
                    msg += '<div class="alert alert-success mt-1">'+result.success+'</div>';
                    PincodeTable();
                    $('#message').html(msg);
                    $("#addPincode").modal('hide');
                    $("#add_pincode")[0].reset();
                    setTimeout(function(){
                      $('#message').html('');
                    }, 5000);
                }
            },
        })
    });

    $('#editpincode').on('submit', function(event){
        event.preventDefault();
        var form_data = new FormData(this);
        $.ajax({
            url:"{{ URL::to('admin/pincode/update') }}",
            method:'POST',
            data:form_data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(result) {
                var msg = '';
                if(result.error.length > 0)
                {
                    for(var count = 0; count < result.error.length; count++)
                    {
                        msg += '<div class="alert alert-danger">'+result.error[count]+'</div>';
                    }
                    $('#emsg').html(msg);
                    setTimeout(function(){
                      $('#emsg').html('');
                    }, 5000);
                }
                else
                {
                    msg += '<div class="alert alert-success mt-1">'+result.success+'</div>';
                    PincodeTable();
                    $('#message').html(msg);
                    $("#EditPincode").modal('hide');
                    $("#editpincode")[0].reset();
                    setTimeout(function(){
                      $('#message').html('');
                    }, 5000);
                }
            },
        });
    });
});
function GetData(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:"{{ URL::to('admin/pincode/show') }}",
        data: {
            id: id
        },
        method: 'POST', //Post method,
        dataType: 'json',
        success: function(response) {
            jQuery("#EditPincode").modal('show');
            $('#id').val(response.ResponseData.id);
            $('#getpincode').val(response.ResponseData.pincode);
        },
        error: function(error) {

            // $('#errormsg').show();
        }
    })
}
function DeleteData(id) {
    // dd(id);
    swal({
        title: "¿Está seguro?",
        text: "¿Está seguro de eliminar el Código de Ubicación?",
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
                url:"{{ URL::to('admin/pincode/destroy') }}",
                data: {
                    id: id
                },
                method: 'POST',
                success: function(response) {
                    if (response == 1) {
                        swal({
                            title: "'¡Aprobado!",
                            text: "Pincode fue eliminado.",
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
function PincodeTable() {
    $.ajax({
        url:"{{ URL::to('admin/pincode/list') }}",
        method:'get',
        success:function(data){
            $('#table-display').html(data);
            $(".zero-configuration").DataTable()
        }
    });
}
</script>
@endsection