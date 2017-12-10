<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\State;

class CityController extends Controller
{
    public function index($initials = 'MG')
    {
        $state = State::where('initials', $initials)->with('cities')->get()->first();
        //dd($state);
        if(!$state)
            return redirect()->back();
        $cities = $state->cities;

        $title = "Cidades Brasileiras";
        return view('panel.cities.index', compact('cities', 'title', 'state'));
    }
}
