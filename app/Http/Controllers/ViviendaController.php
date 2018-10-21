<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vivienda;
use App\Recibos;
use App\Cuenta;
use App\Service\ViviendaService;
use App\Exception\BusinessException;

class ViviendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viviendas = Vivienda::where('estado',1)->paginate(5);
        return view('vivienda.index')->with('viviendas',$viviendas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vivienda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // validate form data
      $this->validate($request,[
          'descripcion' => 'required|min:3|max:30'
      ]);
      //Process de data and submit it
      $vivienda = Vivienda::find($request->id);
      if($vivienda === null){
          $vivienda = new Vivienda();
          $vivienda->estado = 1;
      }

      $vivienda->descripcion = $request->descripcion;

      try{
        ViviendaService::save($vivienda);
        return redirect()->route('vivienda.index');
      }
      catch(BusinessException $e){
        return redirect()->route('vivienda.create');
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      // Use the model to get one record from DB
      $vivienda = Vivienda::findOrFail($id);
      $recibos = Recibos::where('vivienda_id',$id)->whereIn('estado',[1,2])->orderBy('fecLimite','desc')->paginate(10);
      $cuentas = Cuenta::where('estado',1)->paginate(10);
      //Show the view and pass the record
      return view('vivienda.show')->with(['vivienda'=>$vivienda,'recibos'=>$recibos,'cuentas'=>$cuentas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      // Use the model to get one record from DB
      $vivienda = Vivienda::findOrFail($id);
      //Show the view and pass the record
      return view('vivienda.edit')->with('vivienda',$vivienda);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // validate form data
      $this->validate($request,[
          'descripcion' => 'required|min:3|max:30'
      ]);
      //Process de data and submit it
      $vivienda = Vivienda::findOrFail($id);
      $vivienda->descripcion = $request->descripcion;

      //Redirect if successfull
      if($vivienda->save()){
          return redirect()->route('vivienda.index');
      }
      else{
          return redirect()->route('vivienda.edit');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $vivienda = Vivienda::findOrFail($id);
      $vivienda->estado = 0;
      if($vivienda->save()){
          return redirect()->route('vivienda.index');
      }
    }

    public function crearResidente($id)
    {
      $vivienda = Vivienda::findOrFail($id);
      return view('admin.residentes.create')->with('vivienda',$vivienda);
    }
}
