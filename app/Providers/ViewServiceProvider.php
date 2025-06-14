<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Mou;
use App\Models\IaPks;
use Carbon\Carbon;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('layouts.navbar', function ($view) {
            $mouKadaluarsa = Mou::where('tanggal_selesai', '<', Carbon::now())->count();
            $iaPksKadaluarsa = IaPks::where('tanggal_selesai', '<', Carbon::now())->count();

            $totalKadaluarsa = $mouKadaluarsa + $iaPksKadaluarsa;

            $view->with('totalKadaluarsa', $totalKadaluarsa);
        });
    }
}
