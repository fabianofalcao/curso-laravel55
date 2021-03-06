<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plane;
use App\Models\Brand;
use App\Http\Requests\PlaneStoreUpdadeFormRequestValidator;

class PlaneController extends Controller
{
    private $plane;
    protected $totalPage = 10;

    public function __construct(Plane $plane)
    {
        $this->plane = $plane;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Aviões Cadastrados';
        $planes = $this->plane->with('brand')->paginate($this->totalPage);
        return view('panel.planes.index', compact('title', 'planes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Adicionar Aviões';
        $brands = Brand::pluck('name', 'id');
        $classes = $this->plane->classes();
        return view('panel.planes.create', compact('title', 'classes', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlaneStoreUpdadeFormRequestValidator $request)
    {
        $dataForm = $request->all();
        $insert = $this->plane->create($dataForm);
        if($insert){
            return redirect()->route('avioes.index')->with('success', 'Cadastro realizado com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Falha ao cadastrar')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plane = $this->plane->with('brand')->find($id);
        if(!$plane)
            return redirect()->back();

        $title = "Detalhes do avião";
        $brand = $plane->brand->name;

        return view('panel.planes.show', compact('title', 'plane', 'brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plane = $this->plane->find($id);
        if(!$plane)
            return redirect()->back();

        $title = "Editar Avião";
        $brands = Brand::pluck('name', 'id');
        $classes = $this->plane->classes();
        return view('panel.planes.edit', compact('title', 'plane', 'brands', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlaneStoreUpdadeFormRequestValidator $request, $id)
    {
        $plane = $this->plane->find($id);
        if(!$plane)
            return redirect()->back();

        $update = $plane->update($request->all());
        if($update){
            return redirect()->route('avioes.index')->with('success', 'Cadastro editado com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Falha ao editar cadastro');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plane = $this->plane->find($id);
        if(!$plane)
            return redirect()->back();

        if($plane->delete())
            return redirect()->route('avioes.index')->with('success', 'Registro excluído com sucesso!');
        else
            return redirect()->back()->with('error', 'Falha ao excluir registro');
    }

    public function search(Request $request)
    {
        $dataForm = $request->except('_token');

        $planes = $this->plane->search($request, $this->totalPage);
        $title = "Aviões Cadastrados";

        return view('panel.planes.index', compact('planes', 'title', 'dataForm'));
    }
}
