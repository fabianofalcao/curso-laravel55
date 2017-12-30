<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Airport;
use App\Models\City;
use App\Models\State;

class AirportController extends Controller
{

    private $airport, $city, $totalPage;

    public function __construct(City $city, Airport $airport)
    {
        $this->city = $city;
        $this->airport = $airport;
        $this->totalPage = 10;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idCity)
    {
        $stateInitials = '';
        $city = $this->city->find($idCity);
        //dd($state);
        if(!$city)
            return redirect()->back();
        else {
            $state = State::where('id', $city->state_id)->get()->first();
            //dd($state);
            $stateInitials = $state->initials;
        }
        $airports = $city->airports()->paginate($this->totalPage);

        $title = "Aeroportos de {$city->name}";
        return view('panel.airports.index', compact('city', 'title', 'airports', 'stateInitials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idCity)
    {
        $city = $this->city->find($idCity);
        if(!$city)
            return redirect()->back();
        else {
            $state = State::where('id', $city->state_id)->get()->first();
            $stateInitials = $state->initials;
        }

        $title = "Cadastrar novo aeroporto na cidade {$city->name}";

        //$cities = $this->city->pluck('name', 'id');

        return view('panel.airports.create', compact('title', 'city', 'stateInitials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
