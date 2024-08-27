<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class AphSettingsController extends Controller
{
    public function __construct(){}

    public function index(): View
    {
        return view('panel.aph-settings.index');
    }
}
