<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Admin; // Correct the namespace for the Admin model

class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Share admin data with all views
        $admins = Admin::all(); // Fetch all admins, or you can apply any filter
        View::share('admins', $admins);
    }

    public function register()
    {
        //
    }
}
