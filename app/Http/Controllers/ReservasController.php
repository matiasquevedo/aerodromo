<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserva;
use App\Avion;
use App\User;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = Reserva::all();
        /*if ($reservas->count()) {
            foreach ($reservas as $key => $value) {
                $events[] = Calendar::event(
                    $value->avion->modelo,
                    true,
                    new \DateTime($value->fecha),
                    new \DateTime($value->fecha.' +1Dia'),
                    null
                );
            }
        }
        //dd($events);
        $calendar = \Calendar::addEvents($events);

        //return view('')->with('calendar',$calendar);
        return view('admin.reservas.index', compact('calendar'));*/
        $aviones = Avion::orderBy('modelo','ASC')->pluck('modelo','id');
        $usuarios = User::orderBy('name','ASC')->pluck('name','id');
        return view('admin.reservas.index')->with('reservas',$reservas)->with('aviones',$aviones)->with('usuarios',$usuarios);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $aviones = Avion::orderBy('modelo','ASC')->pluck('modelo','id');
        $usuarios = User::orderBy('name','ASC')->pluck('name','id');
        return view('admin.reservas.create')->with('aviones',$aviones)->with('usuarios',$usuarios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $reserva = new Reserva($request->all());
        $reserva->horas = $reserva->hora_hasta - $reserva->hora_desde;
        flash('Se ha reservado el avion: '. $reserva->avion->model . 'la fecha: '. $reserva->fecha);
        $reserva->save();
        return redirect()->route('reservas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    }
}
