<?php

namespace App\Console;

use Illuminate\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The application's command schedule.
     *
     * @var \Illuminate\Console\Scheduling\Schedule
     */
    protected $schedule;

    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // 注册 Artisan 命令
    ];

    /**
     * Define the application's command schedule.
     *
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // 调度命令
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    public function commands()
    {
        // 注册 Artisan 命令
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
