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

$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();

	$('#tblCuentas').DataTable( {
		"paging": false,
		"lengthChange": false,
		"searching": false,
		"ordering": false,
		"info": false,
		"autoWidth": false,
		"dom": '<"toolbar">frtip'
	});

	$("div.toolbar").html('<button data-target="#addModal" data-toggle="modal" class="btn btn-sm btn-success"><ion-icon name="add"></ion-icon></button>');


  $('#tblMovimientos').DataTable( {
		"paging": false,
		"lengthChange": false,
		"searching": false,
		"ordering": false,
		"info": false,
		"autoWidth": false,
		"dom": '<"toolbarx">frtip'
	});
  $("div.toolbarx").html('<button data-target="#addMovModal" data-toggle="modal" class="btn btn-sm btn-success"><ion-icon name="add"></ion-icon></button> <button data-target="#exportModal" data-toggle="modal" class="btn btn-sm btn-success"><ion-icon name="download"></ion-icon></button>');


	//Money Euro
    $("#saldo").inputmask({ alias : "pesos", prefix: '$' ,removeMaskOnSubmit: true});

    //movimientos
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#fecTransfer').datepicker({
      autoclose: true,
      format: "yyyy-mm-dd"
    });
    $('#fecIngreso').datepicker({
      autoclose: true,
      format: "yyyy-mm-dd"
    });
    $('#fecEgreso').datepicker({
      autoclose: true,
      format: "yyyy-mm-dd"
    });
    $('#fecIngreso').datepicker('setDate', today);
    $('#fecEgreso').datepicker('setDate', today);
    $('#fecTransfer').datepicker('setDate', today);

    $('#fecInicio').datepicker({
      autoclose: true,
      format: "yyyy-mm-dd"
    });
    $('#fecFin').datepicker({
      autoclose: true,
      format: "yyyy-mm-dd"
    });

    //Money Euro
    $("#transferImporte").inputmask({ alias : "pesos", prefix: '$',removeMaskOnSubmit: true });
    $("#ingresoImporte").inputmask({ alias : "pesos", prefix: '$',removeMaskOnSubmit: true });
    $("#egresoImporte").inputmask({ alias : "pesos", prefix: '$',removeMaskOnSubmit: true });
    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });

});
