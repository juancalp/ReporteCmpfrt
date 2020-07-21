@extends('layouts.app')

@section('content')

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
@endpush

    @include('layouts.headers.cards')
    
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-gradient-white shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-primary ls-1 mb-1"><!-- Texto pequeno aca -->  </h6>
                                <h2 class="text-primary mb-0">Disponibilidad Diaria</h2>
                            </div>
                            <div class="col">
                            <form action="/disponibilidad" method="GET">

                            <div class="input-daterange" id="datepicker">
                            

                                <div class="row datepicker input-daterange" id="datepicker">
                                
                                    <div class="col-md-3">
                                        <input
                                            type="text"
                                            name="from_date"
                                            id="from_date"
                                            class="form-control"
                                            placeholder="From Date"
                                            readonly
                                        />
                                    </div>
                                    <div class="col-md-3">
                                        <input
                                            type="text"
                                            name="to_date"
                                            id="to_date"
                                            class="form-control"
                                            placeholder="To Date"
                                            readonly
                                        />
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary">
                                            ACTUALIZAR
                                        </button>
                                    </div>
                                </div>
                            </form>
                                
                            </div>
                        </div>
                    </div>
                    <div class="card-body mt-2">
                        <!-- Chart -->
                        <div class="chart ">
                            <!-- Chart wrapper -->
                            {!! $LineChart->container() !!}
                            {!! $LineChart->script() !!}
                        </div>
                    </div>

                    
                </div>
            </div>
            </div>
            
            <!-- Chart -->

            <div class="col-xl-4 mb-5 mb-xl-0 mt-4">
                <div class="card bg-gradient-white shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-primary ls-1 mb-1"><!-- Texto pequeno aca --> </h6>
                                <h2 class="text-primary mb-0 ">PREPARACION</h2>
                            </div>
                            <div class="col">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            {!! $PieChartP->container() !!}
                            
                            {!! $PieChartP->script() !!}
                            
                        </div>
                    </div>
                </div>
            </div>

            <!-- end Chart -->
            <div class="col-xl-4 mb-5 mb-xl-0 mt-4">
                <div class="card bg-gradient-white shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-primary ls-1 mb-1"><!-- Texto pequeno aca --> </h6>
                                <h2 class="text-primary mb-0">EMPAQUE</h2>
                            </div>
                            <div class="col">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart ">
                            <!-- Chart wrapper -->
                            {!! $PieChartE->container() !!}
                            
                            {!! $PieChartE->script() !!}
                            
                        </div>
                    </div>
                </div>
            </div>

            <!-- end Chart -->

            <div class="col-xl-4 mb-5 mb-xl-0 mt-4">
                <div class="card bg-gradient-white shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-primary ls-1 mb-1"><!-- Texto pequeno aca --> </h6>
                                <h2 class="text-primary mb-0">LLENADO</h2>
                            </div>
                            <div class="col">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            {!! $PieChartL->container() !!}
                            
                            {!! $PieChartL->script() !!}
                            
                        </div>
                    </div>
                </div>
            </div>

            <!-- end Chart -->

            
    </div>
        <script>
    $(document).ready(function() {
        $(".input-daterange").datepicker({
            todayBtn: "linked",
            format: "d-m-Y",
            startDate: '-1d',
            autoclose: true
        });
    });
</script>

        @include('layouts.footers.auth')
    </div>
@endsection


