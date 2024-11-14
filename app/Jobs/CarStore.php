<?php

namespace App\Jobs;

use App\Models\Car;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CarStore implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public $car; 
    public function __construct($car)
    {
        $this->car = $car;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        for ($i=0; $i < 300000; $i++) { 
            Car::create(['name' => $this->car . '-' . $i ]); 
        };
    }
}
