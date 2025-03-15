<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use app\Console\Commands\AddSalaire;
use app\Console\Commands\SubDepense;


Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command(AddSalaire::class)->daily();
Schedule::command(SubDepense::class)->daily();
