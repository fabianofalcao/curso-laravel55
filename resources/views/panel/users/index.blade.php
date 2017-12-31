@extends('panel.layout.template')

@section('content')


    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Home page</a>
        </li>
        <li class="breadcrumb-item active">Usuários cadastrados</li>
    </ol>
    

    <!-- Inicio Mensagem de erro -->
    <div class="messages">
        @include('panel.includes.alerts')
    </div>
    <!-- Fim Mensagem de erro -->

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-users"></i> {{$title or 'Gestão de usuários'}} 
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-search pull-right">
                                <!-- <form class="form form-inline"> -->
                            {!! Form::open(['route' => 'usuarios.search', 'class' => 'form form-inline']) !!}
                            <!-- <input type="text" name="nome" placeholder="Nome:" class="form-control form-control-sm"> -->
                                {!! Form::text('key_search', null, ['placeholder' => 'O que deseja encontar?']) !!}
                                <button class="btn btn-sm btn-dark">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    Pesquisar
                                </button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    @if(isset($dataForm['key_search']))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-secondary margin-top10">
                                <a href="{{route('usuarios.index')}}"><i class="fa fa-refresh" aria-hidden="true"></i>
                                Resultados para: <strong>{{$dataForm['key_search']}}</strong></a>
                                </div>
                            </div>
                        </div>
                    @endif

                <!-- Botão de adicionar -->
                    <a href="{{route('usuarios.create')}}" class="btn btn-sm btn-dark margin-bottom20">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        Adicionar usuário
                    </a>
                    <!-- Fim botão de adicionar-->

                    <div class="table-responsive">
                        <table class="table table-sm table-bordered" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Foto</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th width="280" class="text-center">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>
                                    @if($user->image)
                                        <img src="{{url("storage/users/{$user->image}")}}" alt="{{$user->id}}" style="max-width: 60px;">
                                    @else
                                        <img src="{{url('assets/panel/imgs/no-image.png')}}" alt="{{$user->id}}" style="max-width: 60px;">
                                    @endif
                                    </td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td class="text-center">
                                        <a href="{{route('usuarios.show', $user->id)}}" class="btn btn-sm btn-secondary">Visualizar</a>
                                        <a href="{{route('usuarios.edit', $user->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="200">Nenhuma usuário cadastrado!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        @if(isset($dataForm))
                            {!!  $users->appends($dataForm)->links('vendor.pagination.bootstrap-4') !!}
                        @else
                            {!! $users->links('vendor.pagination.bootstrap-4') !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection