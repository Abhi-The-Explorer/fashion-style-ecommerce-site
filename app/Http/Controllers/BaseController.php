<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;



class BaseController extends Controller
{
    public function __construct()
    {

        
        // Share admin data with all views
        view()->composer('*', function (View $view) {
            $view->with('admin', Auth::guard('admin')->user());
        });
    }
}

