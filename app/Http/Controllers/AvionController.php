<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Avion;
use App\Motor;
use App\Helice;

class AvionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $aviones = Avion::orderBy('id','ASC')->paginate(5);
        return view('admin.aviones.index')->with('aviones',$aviones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.aviones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //        dd($request);
        $avion = new Avion($request->all());
        $avion->save();
        $motor = new Motor();
        $motor->modelo = $request->modeloMotor;
        $motor->numeracion = $request->numeracion;
        $motor->descripcion = $request->descripcionMotor;
        $motor->avion_id = $avion->id;
        $motor->user_id = \Auth::user()->id;

        $helice = new Helice();
        $helice->modelo = $request->modeloHelice;
        $helice->numeracion = $request->numeracionH;
        $helice->descripcion = $request->descripcionH;
        $helice->avion_id = $avion->id;
        $helice->user_id = \Auth::user()->id;

        //dd($avion);
        
        $motor->save();
        $helice->save();
        flash('Se ha creado el avion '.$avion->model)->success();
        return redirect()->route('aviones.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $avion = Avion::find($id);
        //dd($avion->reserva);
        $reservas=$avion->reserva;
        return view('admin.aviones.show')->with('avion',$avion)->with('reservas',$reservas);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $avion = Avion::find($id);
        flash('Se ha eliminado el avion '. $avion->modelo)->error();
        $avion->delete();
        return redirect()->route('aviones.index');
    }
}
