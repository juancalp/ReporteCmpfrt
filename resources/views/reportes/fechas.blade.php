@extends('layouts.app')

@section('content')

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush

    @include('layouts.headers.cards')
    
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-gradient-white shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-primary ls-1 mb-1">Overview</h6>
                                <h2 class="text-primary mb-0">Disponibilidad value</h2>
                            </div>
                            <div class="col">
                            
                                
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                           asd
                        </div>
                    
                    </div>
            </div>
            
        </div>
    </div>
        <script>
   
</script>

        @include('layouts.footers.auth')
    </div>
@endsection

