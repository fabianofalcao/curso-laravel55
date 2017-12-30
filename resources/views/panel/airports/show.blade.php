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
        <li class="breadcrumb-item active">Detalhes do aeroporto {{$airport->name}}</li>
    </ol>
    <!-- Fim Breadcrumbs-->


    <!-- Inicio Mensagem de erro -->
    <div class="messages">
        @include('panel.includes.alerts')
    </div>
    <!-- Final Mensagem de erro -->

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-thumb-tack"></i> Detalhes do aeroporto: {{$airport->id}}
                </div>

                <div class="card-body">
                    <ul>
                        <li>
                            Código: <strong>{{$airport->id}}</strong>
                        </li>
                        <li>
                            Nome: <strong>{{$airport->name}}</strong>
                        </li>
                        <li>
                            Cidade: <strong>{{$city->name}}</strong>
                        </li>
                        <li>
                            Latitude: <strong>{{$airport->latitude}}</strong>
                        </li>
                        <li>
                            Longitude: <strong>{{$airport->longitude}}</strong>
                        </li>
                        <li>
                            Endereço: <strong>{{$airport->address}}, nº {{$airport->number}} - {{$airport->district}}</strong>
                        </li>
                        <li>
                            CEP: <strong>{{$airport->zip_code}}</strong>
                        </li>
                        <li>
                            Complemeto: <strong>{{$airport->complement}}</strong>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    {!! Form::open(['route' => ['aeroportos.destroy', $city->id, $airport->id], 'class' => 'form form-search form-ds', 'method' => 'DELETE']) !!}
    <div class="form-group">
        {!! Form::submit('Excluir aeroporto', ['class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Deseja realmente excluir registro?')"]) !!}
    </div>
    {!! Form::close() !!}

@endsection