@extends('panel.layout.template')

@section('content')


    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('panel')}}">Home page</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('voos.index')}}">Voos</a>
        </li>
        <li class="breadcrumb-item active">{{$title or 'Gestão de Voos'}}</li>
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
                    <i class="fa fa-fighter-jet"></i> {{$title or 'Gestão de Voos'}}
                </div>
                <div class="card-body">
                    {!! Form::model($flight, ['route' => ['voos.update', $flight->id], 'name' => 'form_upd_flight', 'id' => 'form_upd_flight', 'method' => 'PUT', 'files' => true]) !!}
                    @include('panel.flights.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection