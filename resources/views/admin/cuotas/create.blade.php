@extends('common.user')
@section('styles')
<!-- iCheck for checkboxes and radio inputs -->
 <link rel="stylesheet" href="{{asset('dashboard/plugins/iCheck/all.css')}}">
@endsection
@section('content')


<section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
				<form action="{{route('cuotas.store')}}" method="POST">
                    {{ csrf_field () }}
					<div class="modal-header">
						<h4 class="modal-title">Crear Cuota</h4>
						<a href="#" class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
					</div>
					<div class="modal-body">
            <div class="row">
            <div class="col-md-6">
  						<div class="form-group">
  							<label for="descripcion">Descripcion</label>
  							 <input type="text"  name="descripcion" id="descripcion" class="form-control"/ required>
  						</div>
              <!-- IP mask -->
              <div class="form-group">
                <label>Importe:</label>
                  <input id="importe" name="importe" type="text" class="form-control">
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <!-- Date -->
              <div class="form-group">
                <label>Fecha:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="fecPago" name="fecPago">
                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                <label>Periodo de gracia</label>
                <select class="form-control select2" name="periodoGracia" id="periodoGracia" style="width: 100%;">
                  <option value="0">0 Dias</option>
                  <option value="5">5 Dias</option>
                  <option value="10">10 Dias</option>
                  <option value="15">15 Dias</option>
                </select>
              </div>
              <!-- /.form group -->
              <div class="form-group">
                <label for="chkRpt">
                  <input id="chkRpt" type="checkbox" class="flat-red" name="chkRpt"/>
                    Repetir
                </label>
              </div>

              <div id="dvRpt" class="form-group" style="display: none">
                <label>Periodicidad</label>
                <select class="form-control select2" name="periodicidad" id="periodicidad" style="width: 100%;">
                  <option value="1">Mensual</option>
                  <option value="2">Anual</option>
                </select>
              </div>

              <div id="dvNPeriodos" class="form-group" style="display: none">
                <label>Repeticiones</label>
                <input id="nPeriodos" name="nPeriodos" type="text" class="form-control">
              </div>
            </div>

            <div class="col-md-6">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="10%">
        							<span class="custom-checkbox">
        								<input type="checkbox" id="selectAll">
        								<label for="selectAll"></label>
        							</span>
        						</th>
                    <th>Vivienda</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($viviendas as $vivienda)
                  <tr>
                    <td>
                      <span class="custom-checkbox">
        								<input type="checkbox" id="checkbox1" name="selected[]" value="{{$vivienda->id}}">
        								<label for="checkbox1"></label>
        							</span>
                    </td>
                    <td>{{$vivienda->descripcion}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
					</div>
        </div>
					<div class="modal-footer">
                        <a href="{{route('cuotas.index')}}" class="btn btn-default">Cancelar</a>
						<input type="submit" class="btn btn-success" value="Guardar">
					</div>
				</form>
      </div>
      </div>
      <!-- /.row -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
@section('scripts')
<script src="{{asset('dashboard/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('dashboard/plugins/iCheck/icheck.min.js')}}"></script>
<!-- InputMask -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.2.6/jquery.inputmask.bundle.min.js"></script>

<script>
Inputmask.extendAliases({
  pesos: {
            prefix: "₱ ",
            groupSeparator: ".",
            alias: "numeric",
            placeholder: "0",
            autoGroup: !0,
            digits: 2,
            digitsOptional: !1,
            clearMaskOnLostFocus: !1
        }
});

$(function () {
    $('#fecPago').datepicker({
      autoclose: true,
      dateFormat: "yy-mm-dd"
    });

    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    $('#chkRpt').on('ifChecked', function(event){
      $("#dvRpt").show();
      $("#dvNPeriodos").show();
    });

    $('#chkRpt').on('ifUnchecked', function(event){
      $("#dvRpt").hide();
      $("#dvNPeriodos").hide();
    });

    //Money Euro

    $("#importe").inputmask({ alias : "pesos", prefix: '$' });
    $("#nPeriodos").inputmask({ alias : "integer" });


	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;
			});
		} else{
			checkbox.each(function(){
				this.checked = false;
			});
		}
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>

@endsection
