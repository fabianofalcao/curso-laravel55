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
        <li class="breadcrumb-item">
            <a href="{{route('aeroportos.index', $city->id)}}">Aeroportos da cidade {{$city->name}}</a>
        </li>
        <li class="breadcrumb-item active">Adicionar aeroporto na cidade {{$city->name}}</li>
    </ol>
    <!-- Fim Breadcrumbs-->

    <!-- Inicio Mensagem de erro -->
    <div class="messages">
        @include('panel.includes.errors')
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-thumb-tack"></i> {{$title or 'Gestão de Aeroportos'}}
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => ['aeroportos.store', $city->id], 'name' => 'form_add_airports', 'id' => 'form_add_airports', 'method' => 'POST', 'files' => true]) !!}
                        @include('panel.airports.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection