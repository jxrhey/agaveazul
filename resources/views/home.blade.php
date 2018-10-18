@extends('_template.dashboard')

@section('title')
  <title>Home</title>
@endsection

@section('styles')
  <link href="{{asset('css/custom-checkbox.css')}}" rel="stylesheet">
  <link href="{{asset('css/custom-table.css')}}" rel="stylesheet">
  <link href="{{asset('css/custom-modal.css')}}" rel="stylesheet">
  <link href="{{asset('css/custom-pagination.css')}}" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('dashboard/plugins/datatables/dataTables.bootstrap.css')}}">
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Casa 10
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">


              <h3 class="profile-username text-center">Casa 10</h3>

              <p class="text-muted text-center">Agave Azul V</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Saldo</b> <a class="pull-right">$1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Estatus</b> <a class="pull-right"><span class="label label-success">Corriente</span></a>
                </li>

              </ul>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Recibos</a></li>
              <li><a href="#timeline" data-toggle="tab">Contactos</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane table-responsive" id="activity">
                <table id="tblRecibos" class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Cuota</th>
                      <th>Recibo</th>
                      <th>Limite</th>
                      <th>Pago</th>
                      <th>Importe</th>
                      <th>Estatus</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <td>XXXXX</td>
                      <td>XXXXX</td>
                      <td>XXXXX</td>
                      <td>XXXXX</td>
                      <td>XXXXX</td>
                      <td>XXXXX</td>
                      <td>
                        <a href="#" class="edit" data-toggle="modal"><ion-icon  name="create" data-toggle="tooltip" title="Edit"></i></a>
                        <a href="#" class="delete" data-toggle="modal"><ion-icon name="trash" data-toggle="tooltip" title="Delete"></i></a>
                      </td>
                    </tr>

                  </tbody>
                </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane table-responsive" id="timeline">
                <table id="tblContactos" class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>
                        <span class="custom-checkbox">
                          <input type="checkbox" id="selectAll">
                          <label for="selectAll"></label>
                        </span>
                      </th>
                      <th>Nombre</th>
                      <th>Email</th>
                      <th>Telefono</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <td>
                        <span class="custom-checkbox">
                        <input type="checkbox" id="checkbox1" name="options[]" value="1">
                        <label for="checkbox1"></label>
                        </span>
                      </td>
                      <td>XXXXX</td>
                      <td>XXXXX</td>
                      <td>XXXXX</td>
                      
                      <td>
                        <a href="#" class="edit" data-toggle="modal"><ion-icon  name="create" data-toggle="tooltip" title="Edit"></i></a>
                        <a href="#" class="delete" data-toggle="modal"><ion-icon name="trash" data-toggle="tooltip" title="Delete"></i></a>
                      </td>
                    </tr>


                  </tbody>
                </table>
              </div>
              <!-- /.tab-pane -->


            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- /.content-wrapper -->
@endsection
@section('scripts')
<!-- DataTables -->
<script src="{{asset('dashboard/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<script src="https://unpkg.com/ionicons@4.4.4/dist/ionicons.js"></script>
<script src="{{asset('dashboard/js/app.min.js')}}"></script>
<script src="{{asset('js/vivienda/show.js')}}"></script>
@endsection
