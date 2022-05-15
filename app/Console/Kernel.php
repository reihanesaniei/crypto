<?php

namespace App\Console;

use App\Models\Pricelist;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

       $schedule->command('close:jobs')->everyMinute();
    }
// in app\Console\Kernel.php

    protected function shortSchedule(\Spatie\ShortSchedule\ShortSchedule $shortSchedule)
    {
        // this artisan command will run every second


        //$shortSchedule->command('close:jobs')->everySecond(3);

        // this artisan command will run every second, its signature will be resolved from container
        //$shortSchedule->command(\Spatie\ShortSchedule\Tests\Unit\TestCommand::class)->everySecond(3);
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
