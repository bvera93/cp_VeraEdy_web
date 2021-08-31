@extends('theme.default')

@section('content')

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/admin/home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">banner Promocional</a></li>
        </ol>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBanner" data-whatever="@addBanner">Agregar banner promocional</button>
        <!-- Add Promation Banner -->
        <div class="modal fade" id="addBanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo banner promocional</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <form id="add_banner" enctype="multipart/form-data">
                    <div class="modal-body">
                        <span id="msg"></span>
                        @csrf
                        <div class="form-group">
                            <label for="image" class="col-form-label">Imagen:</label>
                            <input type="file" class="form-control" name="image" id="image" accept=".png, .jpg, .jpeg">
                            <input type="hidden" name="removeimg" id="removeimg">
                        </div>
                        <div class="gallery"></div>                
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Promation Banner -->
        <div class="modal fade" id="EditBanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabeledit" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="post" name="editbanner" class="editbanner" id="editbanner" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabeledit">Editar banner promocional</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <span id="emsg"></span>
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="id" name="id">
                            <input type="hidden" class="form-control" id="old_img" name="old_img">
                            <div class="form-group">
                                <label for="image" class="col-form-label">Seleccionar imagen:</label>
                                <input type="file" class="form-control" name="image" id="image" accept=".png, .jpg, .jpeg">
                            </div>
                            <div class="gallerys"></div>
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
                    <h4 class="card-title">Todos los banner Promocionales</h4>
                    <div class="table-responsive" id="table-display">
                        @include('theme.bannertable')
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
     
    $('#add_banner').on('submit', function(event){
        event.preventDefault();
        var form_data = new FormData(this);
        $.ajax({
            url:"{{ URL::to('admin/banner/store') }}",
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
                    BannerTable();
                    $('#message').html(msg);
                    $("#addBanner").modal('hide');
                    $("#add_banner")[0].reset();
                    $('.gallery').html('');
                    setTimeout(function(){
                      $('#message').html('');
                    }, 5000);
                }
            },
        })
    });

    $('#editbanner').on('submit', function(event){
        event.preventDefault();
        var form_data = new FormData(this);
        $.ajax({
            url:"{{ URL::to('admin/banner/update') }}",
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
                    BannerTable();
                    $('#message').html(msg);
                    $("#EditBanner").modal('hide');
                    $("#editbanner")[0].reset();
                    $('.gallery').html('');
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
        url:"{{ URL::to('admin/banner/show') }}",
        data: {
            id: id
        },
        method: 'POST', //Post method,
        dataType: 'json',
        success: function(response) {
            jQuery("#EditBanner").modal('show');
            $('#id').val(response.ResponseData.id);
            $('#getis_admin').val(response.ResponseData.is_admin);

            $('.gallerys').html("<img src="+response.ResponseData.img+" class='img-fluid' style='max-height: 200px;'>");
            $('#old_img').val(response.ResponseData.image);
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
        text: "¿Está seguro de eliminar el banner promocional?",
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
                url:"{{ URL::to('admin/banner/destroy') }}",
                data: {
                    id: id
                },
                method: 'POST',
                success: function(response) {
                    if (response == 1) {
                        swal({
                            title: "'¡Aprobado!",
                            text: "Promation Banner has been deleted.",
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
function BannerTable() {
    $.ajax({
        url:"{{ URL::to('admin/banner/list') }}",
        method:'get',
        success:function(data){
            $('#table-display').html(data);
            $(".zero-configuration").DataTable()
        }
    });
}

 $(document).ready(function() {
     var imagesPreview = function(input, placeToInsertImagePreview) {
          if (input.files) {
              var filesAmount = input.files.length;
              $('.gallery').html('');
              $('.gallerys').html('');
              var n=0;
              for (i = 0; i < filesAmount; i++) {
                  var reader = new FileReader();
                  reader.onload = function(event) {
                       $($.parseHTML('<div>')).attr('class', 'imgdiv').attr('id','img_'+n).html('<img src="'+event.target.result+'" class="img-fluid"><span id="remove_"'+n+' onclick="removeimg('+n+')">&#x2716;</span>').appendTo(placeToInsertImagePreview); 
                      n++;
                  }
                  reader.readAsDataURL(input.files[i]);                                  
             }
          }
      };

     $('#image').on('change', function() {
         imagesPreview(this, '.gallerys');
         imagesPreview(this, '.gallery');
     });
 
});
var images = [];
function removeimg(id){
    images.push(id);
    $("#img_"+id).remove();
    $('#remove_'+id).remove();
    $('#removeimg').val(images.join(","));
}
</script>
@endsection