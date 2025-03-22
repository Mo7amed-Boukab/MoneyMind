<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use app\Console\Commands\AddSalaire;
use app\Console\Commands\SubDepense;
use app\Console\Commands\AlertBudget;
use app\Console\Commands\CheckInactiveUsers;


Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command(AddSalaire::class)->daily();
Schedule::command(SubDepense::class)->daily();
Schedule::command(AlertBudget::class)->daily();
Schedule::command(CheckInactiveUsers::class)->daily();
