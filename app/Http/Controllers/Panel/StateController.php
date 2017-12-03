<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\State;

class StateController extends Controller
{
    private $state;
    protected $totalPage = 10;

    public function __construct(State $state)
    {
        $this->state = $state;
    }

    public function index()
    {
        $states = $this->state->paginate($this->totalPage);
        $title = "Estados Brasileiros";
        return view('panel.states.index', compact('states', 'title'));
    }

    public function search(Request $request)
    {
        $dataForm = $request->except('_token');

        $states = $this->state->search($request, $this->totalPage);
        $title = "Estados Brasileiros";

        return view('panel.states.index', compact('states', 'title', 'dataForm'));
    }
}
