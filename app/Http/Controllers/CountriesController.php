<?php

namespace App\Http\Controllers;

use PragmaRX\Countries\Facade as Countries;

class CountriesController extends Controller
{
    public function index()
    {
        return Countries::all()->pluck('name.common');
    }

    public function show($name)
    {
        return Countries::whereNameCommon($name);
    }
}
