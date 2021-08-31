@extends('theme.default')

@section('content')

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/admin/home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Calificaciones y opiniones</a></li>
        </ol>
    </div>
</div>
<!-- row -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <span id="message"></span>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Todas las Calificaciones</h4>
                    <div class="table-responsive" id="table-display">
                        @include('theme.reviewstable')
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
    function DeleteData(id) {
        swal({
            title: "¿Está seguro?",
            text: "¿Está seguro de eliminar la reseña?",
            type: "advertencia",
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
                    url:"{{ URL::to('admin/reviews/destroy') }}",
                    data: {
                        id: id
                    },
                    method: 'POST',
                    success: function(response) {
                        if (response == 1) {
                            swal({
                                title: "'¡Aprobado!",
                                text: "Calificación eliminada.",
                                type: "Éxito!",
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
                swal("Cancelado", "Su historial está seguro :)", "error");
            }
        });
    }
</script>
@endsection