@extends('panel.layout.template')

@section('content')


    <!-- Breadcrumbs-->
    <ol class="breadcrumb" xmlns:de="http://www.w3.org/1999/xhtml">
        <li class="breadcrumb-item">
            <a href="{{route('panel')}}">Home page</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('estados.index')}}">Estados</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route("estado.cidades", $stateInitials)}}">Cidades de: {{$stateInitials}}</a>
        </li>
        <li class="breadcrumb-item active">Aeroportos da cidade {{$city->name}}</li>
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
                    <i class="fa fa-thumb-tack"></i> Aeroportos de {{$city->name}} - {{$stateInitials}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-search pull-right">
                                <!-- <form class="form form-inline"> -->
                            {!! Form::open(['route' => 'marcas.search', 'class' => 'form form-inline']) !!}
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
                                    <a href=""><i class="fa fa-refresh" aria-hidden="true"></i>
                                        Resultados para: <strong>{{$dataForm['key_search']}}</strong></a>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Botão de adicionar -->
                    <a href="{{route('aeroportos.create', $city->id)}}" class="btn btn-sm btn-dark margin-bottom20">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        Adicionar aeroporto
                    </a>
                    <!-- Fim botão de adicionar-->

                    <div class="table-responsive">
                        <table class="table table-sm table-bordered" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Endereço</th>
                                <th width="280" class="text-center">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($airports as $airport)
                                <tr>
                                    <td>{{$airport->name}}</td>
                                    <td>{{$airport->address}}</td>
                                    <td class="text-center">
                                        <a href="{{route('aeroportos.show', [$city->id, $airport->id])}}" class="btn btn-sm btn-secondary">Visualizar</a>
                                        <a href="{{route('aeroportos.edit', [$city->id, $airport->id])}}" class="btn btn-sm btn-primary">Editar</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="200">Nenhum aeroporto cadastrado!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                        @if(isset($dataForm))
                            {!!  $airports->appends($dataForm)->links('vendor.pagination.bootstrap-4') !!}
                        @else
                            {!! $airports->links('vendor.pagination.bootstrap-4') !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection