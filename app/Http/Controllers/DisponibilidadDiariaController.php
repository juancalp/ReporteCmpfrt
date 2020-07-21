<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DisponibilidadDiaria;
use App\Charts\DisponibilidadDiariaLineChart;
use App\Charts\PreparacionPieChart;
use Carbon\Carbon;


class DisponibilidadDiariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
      if(!empty($request->from_date))
      {
        $time_labels_line = DisponibilidadDiaria::whereBetween('created_at', array($request->from_date, $request->to_date))
        ->orderBy('created_at')->get()->map(function ($time_labels_line){return $time_labels_line->created_at;});

        $time_runnig = DisponibilidadDiaria::whereBetween('created_at', array($request->from_date, $request->to_date))
        ->orderBy('created_at')->get()->pluck('time_runnig','created_at');
        $time_stopped = DisponibilidadDiaria::whereBetween('created_at', array($request->from_date, $request->to_date))
        ->orderBy('created_at')->get()->pluck('time_stopped','created_at'); 
        
        $LineChart = new DisponibilidadDiariaLineChart;
        $LineChart->displayLegend($bold = true);
        $LineChart->labels($time_runnig->keys());
        $LineChart->dataset('Tiempo Perdido', 'line', $time_stopped->values())
        ->color(' #33CCCC ')
        ->backgroundcolor('rgba(0, 0, 0, 0) ')
        ->hoverBackgroundColor(' #56A7C4');
        $LineChart->dataset('Tiempo Operando', 'line', $time_runnig->values())
        ->color(' #DE7D50 ')
        ->backgroundcolor('rgba(0, 0, 0, 0) ')
        ->hoverBackgroundColor(' #E6885D ');
        $LineChart->displayLegend( true);
         
        //PIE CHART PreparacionPieChart
         $time_labels_piePrep = DisponibilidadDiaria::whereBetween('created_at', array($request->from_date, $request->to_date))->take(1)->get()->map(function ($time_labels){return $time_labels->created_at;});

         $time_runnig_piePrep = DisponibilidadDiaria::whereBetween('created_at', array($request->from_date, $request->to_date))->take(1)->pluck('time_runnig','created_at');
         $time_stopped_piePrep = DisponibilidadDiaria::whereBetween('created_at', array($request->from_date, $request->to_date))->take(1)->pluck('time_stopped','created_at');
         $PieChartP = new DisponibilidadDiariaLineChart;
         $PieChartP->labels([$time_labels_piePrep.'Tiempo Operando',$time_labels_piePrep.'Tiempo Detenido']);
         $PieChartP->dataset('Tiempo Operando', 'pie', [$time_runnig_piePrep->values() , $time_stopped_piePrep->values()])
         ->backgroundcolor([' #6AC93E',' #CC3333 '])
         ->hoverBackgroundColor([' #7EDB53',' #E6885D '])
         ->color([' #6AC93E ',' #CC3333']);
         $PieChartP->displayLegend( true);

         //PIE CHART PreparacionPieChart
         $time_labels_piePrep = DisponibilidadDiaria::whereBetween('created_at', array($request->from_date, $request->to_date))->take(1)->get()->map(function ($time_labels){return $time_labels->created_at;});

         $time_runnig_piePrep = DisponibilidadDiaria::whereBetween('created_at', array($request->from_date, $request->to_date))->take(1)->pluck('time_runnig','created_at');
         $time_stopped_piePrep = DisponibilidadDiaria::whereBetween('created_at', array($request->from_date, $request->to_date))->take(1)->pluck('time_stopped','created_at');
         $PieChartE = new DisponibilidadDiariaLineChart;
         $PieChartE->labels([$time_labels_piePrep.'Tiempo Operando',$time_labels_piePrep.'Tiempo Detenido']);
         $PieChartE->dataset('Tiempo Operando', 'pie', [$time_runnig_piePrep->values() , $time_stopped_piePrep->values()])
         ->backgroundcolor([' #6AC93E',' #CC3333 '])
         ->hoverBackgroundColor([' #7EDB53',' #E6885D '])
         ->color([' #6AC93E ',' #CC3333']);
         $PieChartE->displayLegend( true);

         //PIE CHART PreparacionPieChart
         $time_labels_piePrep = DisponibilidadDiaria::whereBetween('created_at', array($request->from_date, $request->to_date))->take(1)->get()->map(function ($time_labels){return $time_labels->created_at;});

         $time_runnig_piePrep = DisponibilidadDiaria::whereBetween('created_at', array($request->from_date, $request->to_date))->take(1)->pluck('time_runnig','created_at');
         $time_stopped_piePrep = DisponibilidadDiaria::whereBetween('created_at', array($request->from_date, $request->to_date))->take(1)->pluck('time_stopped','created_at');
         $PieChartL = new DisponibilidadDiariaLineChart;
         $PieChartL->labels([$time_labels_piePrep.'Tiempo Operando',$time_labels_piePrep.'Tiempo Detenido']);
         $PieChartL->dataset('Tiempo Operando', 'pie', [$time_runnig_piePrep->values() , $time_stopped_piePrep->values()])
         ->backgroundcolor([' #6AC93E',' #CC3333 '])
        ->hoverBackgroundColor([' #7EDB53',' #E6885D '])
        ->color([' #6AC93E ',' #CC3333']);
        $PieChartL->displayLegend(true);

        }
      else
      {
        $time_labels_line = DisponibilidadDiaria::latest('created_at')->select('created_at')->take(30)->get()->map(function ($time_labels_line){return $time_labels_line->created_at;});

        $time_running_line = DisponibilidadDiaria::latest('created_at')->take(30)->pluck('time_runnig','created_at');
        $time_stopped_line = DisponibilidadDiaria::latest('created_at')->take(30)->pluck('time_stopped','created_at');
        
        $LineChart = new DisponibilidadDiariaLineChart;
        
        //$LineChart->displayLegend(true);
        //rgba(250, 200, 150, 0)         ->backgroundcolor(' #ffce56 ')

        $LineChart->labels($time_labels_line);
        $LineChart->dataset('Tiempo Detenido', 'line', $time_stopped_line->values())
        ->color(' #33CCCC ')
        ->backgroundcolor('rgba(0, 0, 0, 0) ')
        ->hoverBackgroundColor(' #56A7C4');
        $LineChart->dataset('Tiempo Operando', 'line', $time_running_line->values())
        ->color(' #CC3333 ')
        ->backgroundcolor('rgba(0, 0, 0, 0) ')
        ->hoverBackgroundColor(' #E6885D ');
        $LineChart->displayLegend( true);
        
        //PIE CHART PreparacionPieChart
        $time_labels_piePrep = DisponibilidadDiaria::select('created_at')->take(1)->get()->map(function ($time_labels_piePrep){return $time_labels_piePrep->created_at;});

        $time_runnig_piePrep = DisponibilidadDiaria::latest('created_at')->take(1)->pluck('time_runnig','created_at');
        $time_stopped_piePrep = DisponibilidadDiaria::latest('created_at')->take(1)->pluck('time_stopped','created_at');
        $PieChartP = new DisponibilidadDiariaLineChart;
        $PieChartP->labels(['Tiempo Operando ','Tiempo Detenido ']);
        $PieChartP->dataset('Tiempo Operando', 'pie', [$time_runnig_piePrep->values() , $time_stopped_piePrep->values()])
        ->backgroundcolor([' #6AC93E',' #CC3333 '])
        ->hoverBackgroundColor([' #7EDB53',' #E6885D '])
        ->color([' #6AC93E ',' #CC3333']);
        $PieChartP->displayLegend( true);

        //PIE CHART PreparacionPieChart
        $time_labels_piePrep = DisponibilidadDiaria::select('created_at')->take(1)->get()->map(function ($time_labels_piePrep){return $time_labels_piePrep->created_at;});

        $time_runnig_piePrep = DisponibilidadDiaria::latest('created_at')->take(1)->pluck('time_runnig','created_at');
        $time_stopped_piePrep = DisponibilidadDiaria::latest('created_at')->take(1)->pluck('time_stopped','created_at');
        $PieChartE = new DisponibilidadDiariaLineChart;
        $PieChartE->labels(['Tiempo Operando ','Tiempo Detenido ']);
        $PieChartE->dataset('Tiempo Operando', 'pie', [$time_runnig_piePrep->values() , $time_stopped_piePrep->values()])
        ->backgroundcolor([' #6AC93E',' #CC3333 '])
        ->hoverBackgroundColor([' #7EDB53',' #E6885D '])
        ->color([' #6AC93E ',' #CC3333']);
        $PieChartE->displayLegend( true);

        //PIE CHART PreparacionPieChart
        $time_labels_piePrep = DisponibilidadDiaria::select('created_at')->take(1)->get()->map(function ($time_labels_piePrep){return $time_labels_piePrep->created_at;});

        $time_runnig_piePrep = DisponibilidadDiaria::latest('created_at')->take(1)->pluck('time_runnig','created_at');
        $time_stopped_piePrep = DisponibilidadDiaria::latest('created_at')->take(1)->pluck('time_stopped','created_at');
        $PieChartL = new DisponibilidadDiariaLineChart;
        $PieChartL->labels(['Tiempo Operando ','Tiempo Detenido ']);
        $PieChartL->dataset('Tiempo Operando', 'pie', [$time_runnig_piePrep->values() , $time_stopped_piePrep->values()])
        ->backgroundcolor([' #6AC93E',' #CC3333 '])
        ->hoverBackgroundColor([' #7EDB53',' #E6885D '])
        ->color([' #6AC93E ',' #CC3333']);
        $PieChartL->displayLegend(true);
      }

      return view('/reportes/disponibilidad', compact('LineChart','PieChartP','PieChartE','PieChartL'));
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
