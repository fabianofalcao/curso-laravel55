@extends('panel.layout.template')

@section('content')


    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="panel">Home page</a>
        </li>
        <li class="breadcrumb-item active">Aviões</li>
    </ol>
    <!-- Fim Breadcrumbs-->

    <!-- Inicio Mensagem de erro -->
    <div class="messages">
        @include('panel.includes.alerts')
    </div>
    <!-- Fim Mensagem de erro -->

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-plane"></i> Aviões Cadastrados
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-search pull-right">
                            {!! Form::open(['route' => 'avioes.search', 'class' => 'form form-inline']) !!}
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
                                    <a href=""><i class="fa fa-refresh" aria-hidden="true"></i>
                                        Resultados para: <strong>{{$dataForm['key_search']}}</strong></a>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Botão de adicionar -->
                    <a href="{{route('avioes.create')}}" class="btn btn-sm btn-dark margin-bottom20">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        Adicionar avião
                    </a>
                    <!-- Fim botão de adicionar-->

                    <div class="table-responsive">
                        <table class="table table-sm table-bordered" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Marca</th>
                                <th>Total de Passageiros</th>
                                <th>Classe</th>
                                <th width="280" class="text-center">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($planes as $plane)
                                <tr>
                                    <td>{{$plane->name}}</td>
                                    <td>{{$plane->brand->name}}</td>
                                    <td>{{$plane->qty_passengers}}</td>
                                    <td>{{$plane->classes($plane->class)}}</td>
                                    <td class="text-center">
                                        <a href="{{route('avioes.show', $plane->id)}}" class="btn btn-sm btn-secondary">Visualizar</a>
                                        <a href="{{route('avioes.edit', $plane->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="200">Nenhum avião cadastrado!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                        @if(isset($dataForm))
                            {!!  $planes->appends($dataForm)->links('vendor.pagination.bootstrap-4') !!}
                        @else
                            {!! $planes->links('vendor.pagination.bootstrap-4') !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>









@endsection