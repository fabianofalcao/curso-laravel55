@extends('panel.layout.template')

@section('content')


    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('panel')}}">Home page</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('marcas.index')}}">Marcas</a>
        </li>
        <li class="breadcrumb-item active">Aviões da marca</li>
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
                    <i class="fa fa-plane"></i> Aviões da marca: {{$brand->name}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Total de Passageiros</th>
                                <th>Classe</th>
                                <th width="280" class="text-center">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($planes as $plane)
                                <tr>
                                    <td>{{$plane->name}}</td>
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
                    </div>
                </div>
            </div>
        </div>









@endsection