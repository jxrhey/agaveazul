@extends('_template.dashboard')

@section('title')
  <title>Cuentas</title>
@endsection

@section('styles')
  <link href="{{asset('css/custom-checkbox.css')}}" rel="stylesheet">
  <link href="{{asset('css/custom-table.css')}}" rel="stylesheet">
  <link href="{{asset('css/custom-modal.css')}}" rel="stylesheet">
  <link href="{{asset('css/custom-pagination.css')}}" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('dashboard/plugins/datatables/dataTables.bootstrap.css')}}">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{asset('dashboard/plugins/timepicker/bootstrap-timepicker.min.css')}}">
@endsection

@section('content')
<script type="text/javascript">

</script>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
      <h1>
      Cuenta: <b>{{$selected->descripcion}}</b>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
      </ol>
    </section>


    <!-- Main content -->
   <section class="content">
     <div class="row">
       
       <div class="col-md-12">
         <div class="box box-primary">
           <div class="box-header">
             
           </div>
           <div class="box-body">
             <div class="table-responsive">
             <table id="tblMovimientos" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Descripcion</th>
                    <th>Ingreso</th>
                    <th>Egreso</th>
                    <th>Saldo</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($movimientos as $movimiento)
                  <tr>
                    <td width="40%">
                      @if($movimiento->comprobante != null)
                        <a href="{{asset($movimiento->comprobante)}}" target="_blank">{{$movimiento->descripcion}}</a>
                      @else
                        {{$movimiento->descripcion}}
                      @endif
                    </td>
                    <td width="10%">
                      @if($movimiento->ingreso != null)
                        ${{$movimiento->ingreso}}
                      @endif
                    </td>
                    <td width="10%">
                      @if($movimiento->egreso != null)
                        ${{$movimiento->egreso}}
                      @endif
                    </td>
                    <td width="10%">${{$movimiento->saldo}}</td>
                    <td>
                      {{$movimiento->fecMov}}
                    </td>
                    <td>
                      <a href="#editarModal{{$movimiento->id}}" class="edit" data-toggle="modal"><ion-icon  name="create" title="Editar"></i></a>
                      <a href="#deleteMovModal{{$movimiento->id}}" class="delete" data-toggle="modal"><ion-icon name="trash" data-toggle="tooltip" title="Eliminar"></i></a>
                    </td>
                  </tr>
                    @include('movimientos.modal.delete',['name'=>'deleteMovModal'.$movimiento->id])
                    @if($movimiento->recibos_id != null)
                      @include('recibos.modal.editar',['name'=>'editarModal'.$movimiento->id,'recibo'=>$movimiento->recibo])
                    @else
                      @include('movimientos.modal.edit',['name'=>'editarModal'.$movimiento->id,'movimiento'=>$movimiento])
                    @endif
                  @endforeach
                </tbody>
              </table>
            </div>
              <!-- /.box-body -->
              {!! $movimientos->appends(request()->input())->links() !!}
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->
       </div>

     </div>
     <!-- /.row -->
   </section>
   <!-- /.content -->

   @include('movimientos.modal.add',['name'=>'addMovModal','cuenta'=>$selected])
   @include('movimientos.modal.search',['name'=>'searchMovModal'])
  </div>
  <!-- /.content-wrapper -->
@endsection
@section('scripts')
<!-- DataTables -->
<script src="{{asset('dashboard/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons.js"></script>
<script src="{{asset('dashboard/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('dashboard/plugins/iCheck/icheck.min.js')}}"></script>
<!-- InputMask -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.2.6/jquery.inputmask.bundle.min.js"></script>
<script src="{{asset('dashboard/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('dashboard/js/app.min.js')}}"></script>
<script src="{{asset('js/cuentas/show.js')}}"></script>
<script src="{{asset('js/movimientos/modal/base.js')}}"></script>
@endsection
