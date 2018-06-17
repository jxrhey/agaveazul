@extends('common.user')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{$reciboHeader->cuota->descripcion}} / {{$reciboHeader->descripcion}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Recibos</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Recibos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Importe</th>
                      <th>Ajuste</th>
                      <th>Total</th>
                      <th>Estado</th>
                      <th>Limite</th>
                      <th>Pago</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($reciboHeader->recibos as $rec)
                    <tr>
                      <td><a href="#">{{$rec->vivienda->descripcion}}</a></td>
                      <td>${{number_format($rec->importe, 2, '.', ',')}}</td>
                      <td>${{number_format($rec->ajuste, 2, '.', ',')}}</td>
                      <td>${{number_format($rec->importe+$rec->ajuste, 2, '.', ',')}}</td>
                      <td>
                          @if($rec->estado == 1)
                            <i class="icon ion-md-calendar material-icons" title="Pendiente"></i>
                          @elseif($rec->estado == 2)
                            <i class="icon ion-md-checkmark material-icons" title="Pagado"></i>
                          @elseif($rec->estado == 3)
                            <i class="icon ion-md-warning material-icons" title="Retraso"></i>
                          @endif
                      </td>
                      <td>{{$rec->fecLimite}}</td>
                      <td>{{$rec->fecPago}}</td>
                      <td>
                        @if($rec->estado == 1)
                          <a href="{{route('recibos.pagar',['rec_id'=>$rec->id])}}" class="edit"><i class="icon ion-md-card material-icons" title="Pagar"></i></a>
                        @elseif($rec->estado == 2)
                          <a href="{{asset($rec->comprobante)}}" target="_blank" class="edit"><i class="icon ion-md-eye material-icons" title="Ver recibo"></i></a>
                        @elseif($rec->estado == 3)
                          <a href="{{asset($rec->comprobante)}}" class="edit"><i class="icon ion-md-card material-icons" title="Pagar"></i></a>
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                 </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
             <!-- /.box -->
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection