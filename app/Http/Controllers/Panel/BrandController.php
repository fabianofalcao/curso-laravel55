<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Http\Requests\BrandStoreUpdadeFormRequestValidator;

class BrandController extends Controller
{
    private $brand;
    protected $totalPage = 1;

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Marcas de Aviões';
        $brands = $this->brand->paginate($this->totalPage);
        return view('panel.brands.index', compact('title', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Adicionar Marcas';
        return view('panel.brands.create-edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandStoreUpdadeFormRequestValidator $request)
    {
        $dataForm = $request->all();
        $insert = $this->brand->create($dataForm);
        if($insert){
            return redirect()->route('marcas.index')->with('success', 'Cadastro realizado com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Falha ao cadastrar');
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
        $brand = $this->brand->find($id);
        if(!$brand)
            return redirect()->back();

        $title = "Editar Marca";
        return view('panel.brands.create-edit', compact('title', 'brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandStoreUpdadeFormRequestValidator $request, $id)
    {
        $brand = $this->brand->find($id);
        if(!$brand)
            return redirect()->back();

        $update = $brand->update($request->all());
        if($update){
            return redirect()->route('marcas.index')->with('success', 'Cadastro editado com sucesso!');
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
        //
    }
}
