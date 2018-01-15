<?php

namespace App\Http\Controllers;

use PragmaRX\Countries\Facade as Countries;

class CountriesController extends Controller
{
    public function index()
    {
        return Countries::all();//->pluck('name.common');
    }

    public function search($name)
    {
        $countryNames = Countries::all();//->pluck('name.common', 'postal');

        $filtered = $countryNames->filter(function ($country) use ($name) {
            return strpos(strtolower($country->name->common), strtolower($name)) !== false;
        });
        return $filtered;
    }

    public function show($name)
    {
        return Countries::whereNameCommon($name);
    }
}
