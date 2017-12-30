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
        <li class="breadcrumb-item active">Editar aeroporto {{$airport->name}}</li>
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
                    {!! Form::model($airport, ['route' => ['aeroportos.update', $city->id, $airport->id], 'name' => 'form_upd_airports', 'id' => 'form_upd_airports', 'method' => 'PUT', 'files' => true]) !!}
                    @include('panel.airports.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection