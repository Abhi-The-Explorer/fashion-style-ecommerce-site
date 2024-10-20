<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\TeamMember;

class TeamMemberServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        // view()->composer('frontend.about', function ($view) {
        //     $teamMembers = TeamMember::paginate(50);
        //     $view->with('teamMembers', $teamMembers);
        // });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
