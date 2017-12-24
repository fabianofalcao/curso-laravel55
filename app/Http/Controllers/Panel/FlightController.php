<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Flight;
use App\Models\Plane;
use App\Models\Airport;

class FlightController extends Controller
{
    private $flight;
    protected $totalPage = 10;

    public function __construct(Flight $flight)
    {
        $this->flight = $flight;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Voos Cadastrados';
        //$flights = $this->flight->with(['origin', 'destination'])->paginate($this->totalPage);
        $flights = $this->flight->getItems();
        return view('panel.flights.index', compact('title', 'flights'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Adicionar Voo";
        $planes = Plane::pluck('name', 'id');
        $airports = Airport::pluck('name', 'id');
        return view('panel.flights.create', compact('title', 'planes', 'airports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->flight->newFlight($request))
            return redirect()
                ->route('voos.index')
                ->with('success', 'Sucesso ao cadastrar');
        else
            return redirect()
                ->back()
                ->with('error', 'Falha ao cadastrar')
                ->withInput();
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
        $flight = $this->flight->find($id);
        if(!$flight)
            return redirect()->back();
        $title = 'Editar Voo';
        $planes = Plane::pluck('name', 'id');
        $airports = Airport::pluck('name', 'id');

        return view('panel.flights.edit', compact('title', 'flight', 'planes', 'airports'));
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
        $flight = $this->flight->find($id);
        if(!$flight)
            return redirect()->back();
        if($flight->update($request->all()))
            return redirect()->route('voos.index')->with('success', 'Cadastro editado com sucesso');
        else
            return redirect()->back()->with('error', 'Falha ao atualizar')->withInput();
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