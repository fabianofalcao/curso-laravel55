<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Flight;
use App\Models\Airport;
use App\Models\Reserve;
use App\Http\Requests\ReserveStoreFormRequestValidator;

class SiteController extends Controller
{
    public function index()
    {
        $title = "Home Page";
        $airports = Airport::with('city')->get();
        return view('site.home.index', compact('title', 'airports'));
    }

    public function promotions(Flight $flight)
    {
        $title = 'Promoções';
        $promotions = $flight->promotions();
        //dd($promotions);
        return view('site.promotions.index', compact('title', 'promotions'));
    }

    public function search(Request $request, Flight $flight)
    {
        $title =  'Resultados da Pesquisa';
        $origin = getInfoAirport($request->origin);
        $destination = getInfoAirport($request->destination);

        $flights = $flight->searchFlights($origin['id_airport'], $destination['id_airport'], $request->date);

        $data['title'] = $title;
        $data['flights'] = $flights;
        $data['origin'] = $origin['name_city'];
        $data['destination'] = $destination['name_city'];
        $data['date'] = formatDateAndTime($request->date);

        return view('site.search.search', $data);
    }

    public function detailsFlight($idFlight)
    {
        $flight = Flight::with(['origin', 'destination'])->find($idFlight);
        if(!$flight)
            return redirect()->back();
        $title = "Detalhes do voo {$flight->id}";
        return view('site.flights.details', compact('flight', 'title'));
        dd($idFlight);
    }

    public function reserveFlight(ReserveStoreFormRequestValidator $request, Reserve $reserve)
    {
        //dd($request->all());
        $reservou = $reserve->newReserve($request->flight_id);
        if($reservou)
            return redirect()->route('my.purchases')->with('success', 'Reserva realizada com sucesso');
        else
            return redirect()->back()->with('error', 'Falha ao reservar!');
    }

    public function myPurchases()
    {
        dd("Minhas Compras!");
    }
}
