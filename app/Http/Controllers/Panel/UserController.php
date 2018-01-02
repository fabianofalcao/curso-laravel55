<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\UserStoreUpdateFormRequestValidator;

class UserController extends Controller
{
    private $user;
    protected $totalPage = 10;

    public function __construct(User $user)
    {
        $this->user = $user;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Usuários do sistema cadastrados';
        $users = $this->user->paginate($this->totalPage);
        return view('panel.users.index', compact('title', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Adicionar usuário";
        return view('panel.users.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreUpdateFormRequestValidator $request)
    {
        $nameFile = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $nameFile = uniqid(date('HisYmd')).'.'.$request->image->extension();

            if (!$request->image->storeAs('users', $nameFile))
                return redirect()->back()->with('error', 'Falha ao fazer upload')->withInput();
        }

        if($this->user->newUser($request, $nameFile))
            return redirect()
                ->route('usuarios.index')
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
        $user = $this->user->find($id);
        if(!$user)
            return redirect()->back();
        $title = "Detalhes do usuário {$user->name}";
        return view('panel.users.show', compact('user', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->user->find($id);
        if(!$user)
            return redirect()->back();
        $title = 'Editar Usuário';

        return view('panel.users.edit', compact('title', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserStoreUpdateFormRequestValidator $request, $id)
    {
         $user = $this->user->find($id);
        if(!$user)
            return redirect()->back();

        $nameFile = $user->image;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            if($user->image){
                $nameFile = $user->image;
                var_dump($nameFile);
            }
            else{
                $nameFile = uniqid(date('HisYmd')).'.'.$request->image->extension();
                var_dump($nameFile);
            }
            
            if (!$request->image->storeAs('users', $nameFile))
                return redirect()->back()->with('error', 'Falha ao fazer upload')->withInput();
        }
        
        if($this->user->updateUser($request, $nameFile, $user->id))
            return redirect()->route('usuarios.index')->with('success', 'Cadastro editado com sucesso');
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
        $this->user->find($id)->delete();
        
                return redirect()
                    ->route('usuarios.index')
                    ->with('success', 'Sucesso ao deletar usuário');
    }


    public function search(Request $request)
    {
        $dataForm = $request->except('_token');
        
        $users = $this->user->search($request, $this->totalPage);
        $title = "Usuários Cadastrados";
        
        return view('panel.users.index', compact('users', 'title', 'dataForm'));
    }
}
