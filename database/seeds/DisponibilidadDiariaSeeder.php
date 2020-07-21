<?php

use Illuminate\Database\Seeder;
use App\DisponibilidadDiaria;
use Carbon\Carbon;


class DisponibilidadDiariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 100; $i++) { 
            DisponibilidadDiaria::create([
                
            'id_disponibilidad' => rand(1,2),
            'time_runnig' => rand(60,90),
            'time_stopped' => rand(10,40),
            'created_at' => Carbon::now()->subDays(rand(1,120)),
            'fecha' => Carbon::now()->subDays(rand(1,120)),
            ]);
        }
    }
}
