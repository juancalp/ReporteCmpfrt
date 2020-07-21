<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DisponibilidadDiaria;
use Carbon\Carbon;

class FechasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $time_runnigs = App\DisponibilidadDiaria::latest('created_at')->select('created_at')->take(30)->get()->map(function ($time_runnigs){return $time_runnigs->created_at->format('Y-m-d');});
        $time_stoppeds = DisponibilidadDiaria::latest('created_at')->select('time_stopped')->take(30)->get();

        $dates = DisponibilidadDiaria::select('created_at')->get()->map(function ($time_runnigs){return $time_runnigs->created_at->format('d-m-Y');});
        
         /*
        $datosfechas = DisponibilidadDiaria::get('created_at');
        
        foreach ($datosfechas as $datosfecha) {
            $fechas = $datosfecha->created_at;
        }
        return date($format,strtotime($fechas));
        echo $format->values();
        format('d-m-Y')
        */

         dd($time_runnigs );

        return view('/reportes/fechas');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
