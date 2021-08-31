@extends('theme.default')
<style type="text/css">
    @media  print {
      @page  { margin: 0; }
      body { margin: 1.6cm; }
    }
</style>
@section('content')
<!-- row -->

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/admin/home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Recibo</a></li>
        </ol>
    </div>
</div>
<!-- row -->

<div class="container-fluid">
    <!-- End Row -->
    <div class="card" id="printDiv">
        <div class="card-header">
            Recibo
            <strong>{{$getusers->order_number}}</strong> 
            <span class="float-right"> <strong>Estado:</strong> 
                @if($getusers->status == '1')
                    Pedido recibido
                @elseif ($getusers->status == '2')
                    En camino
                @elseif ($getusers->status == '3')
                    Asignado al conductor
                @elseif ($getusers->status == '4')
                    Entregada
                @else
                    Cancelado
                @endif
            </span>

        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-sm-8">
                    <h6 class="mb-3">Cliente:</h6>
                    <div>
                        <strong>{{$getusers['users']->name}}</strong>
                    </div>
                    <div>{{$getusers->address}}</div>
                    <div>Correo electrónico: {{$getusers['users']->email}}</div>
                    <div>Celular: {{$getusers['users']->mobile}}</div>
                </div>


                @if ($getusers->order_notes !="")
                <div class="col-sm-4">
                    <h6 class="mb-3">Nota de pedido:</h6>
                    <div>{{$getusers->order_notes}}</div>
                </div>
                @endif

            </div>

            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="center">#</th>
                            <th>Producto</th>
                            <th class="right">Costo unitario</th>
                            <th class="center">Cantidad</th>
                            <th class="right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i=1;
                        foreach ($getorders as $orders) {
                        ?>
                        <tr>
                            <td class="center">{{$i}}</td>
                            <td class="left strong">
                                {{$orders->item_name}}
                                @foreach ($orders['addons'] as $addons)
                                <div class="cart-addons-wrap">
                                    <div class="cart-addons">
                                        <b>{{$addons['name']}}</b> : <?php echo env('CURRENCY'); ?>{{number_format($addons['price'], 2)}}
                                    </div>
                                </div>
                                @endforeach

                                @if ($orders->item_notes != "")
                                    <b>Notas</b> : {{$orders->item_notes}}
                                @endif
                            </td>
                            <td class="left"><?php echo env('CURRENCY').''.number_format($orders->item_price, 2); ?></td>
                            <td class="center">{{$orders->qty}}</td>
                            <td class="right"><?php echo env('CURRENCY'); ?>{{number_format($orders->total_price, 2)}}</td>
                        </tr>
                        <?php
                            $data[] = array(
                                "total_price" => $orders->total_price
                            );
                        ?>
                        <?php
                        $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-5">

                </div>

                <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                            <tr>
                                <td class="left">
                                    <strong>IVA</strong> ({{$getusers->tax}}%)
                                </td>
                                <td class="right">
                                    <strong><?php echo env('CURRENCY').''.number_format($getusers->tax_amount, 2); ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="left">
                                    <strong>Gastos de envio</strong>
                                </td>
                                <td class="right">
                                    <strong><?php echo env('CURRENCY').''.number_format($getusers->delivery_charge, 2); ?></strong>
                                </td>
                            </tr>
                            @if ($getusers->discount_amount != 0)
                            <tr>
                                <td class="left">
                                    <strong>Descuento</strong> ({{$getusers->promocode}})
                                </td>
                                <td class="right">
                                    <strong><?php echo env('CURRENCY').''.number_format($getusers->discount_amount, 2); ?></strong>
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <td class="left">
                                    <strong>Total</strong>
                                </td>
                                <td class="right">
                                    <strong><?php echo env('CURRENCY').''.number_format($getusers->order_total, 2); ?></strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>
    <!-- End Row -->
    <button type="button" class="btn btn-primary float-right" id="doPrint">
        <i class="fa fa-print" aria-hidden="true"></i> Imprimir
    </button>
</div>
<!-- #/ container -->

<!-- #/ container -->
@endsection
@section('script')
<script type="text/javascript">
    document.getElementById("doPrint").addEventListener("click", function() {
         var printContents = document.getElementById('printDiv').innerHTML;
         var originalContents = document.body.innerHTML;
         document.body.innerHTML = printContents;
         window.print();
         document.body.innerHTML = originalContents;
    });
</script>
@endsection