<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuenta;
use App\Cuentamovimiento;
class CuentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuentas = Cuenta::where('estado',1)->paginate(10);
        return view('admin.cuentas.index')->with('cuentas',$cuentas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cuentas.create');
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
      $cuenta = new Cuenta();

      $cuenta->descripcion = $request->descripcion;
      $cuenta->saldo = $request->saldo;
      $cuenta->estado = 1;
      //Redirect if successfull
      if($cuenta->save()){
          return redirect()->route('cuentas.show',['id' => $cuenta->id]);
      }
      else{
          return redirect()->route('cuentas.create');
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
        $cuenta = Cuenta::findOrFail($id);
        $cuentas = Cuenta::where('estado',1)->get();
        $movimientos = Cuentamovimiento::where('cuenta_id',$cuenta->id)->orderBy('fecMov','desc')->paginate(5);
        return view('admin.cuentas.show')->with(['selected'=>$cuenta,'cuentas'=>$cuentas,'movimientos'=>$movimientos] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuenta = Cuenta::findOrFail($id);
        return view('admin.cuentas.edit')->with('cuenta',$cuenta);
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
      $this->validate($request,[
          'descripcion' => 'required|min:3|max:30'
      ]);

      $cuenta = Cuenta::findOrFail($id);
      $cuenta->descripcion = $request->descripcion;

      //Redirect if successfull
      if($cuenta->save()){
          return redirect()->route('cuentas.show',['id' => $cuenta->id]);
      }
      else{
          return redirect()->route('cuentas.create');
      }
      return redirect()->route('cuentas.show',['id' => $cuenta->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cuenta = Cuenta::findOrFail($id);
        $cuenta->estado = 0;
        if($cuenta->save()){
            return view('admin.cuentas.index');
        }

    }
}
