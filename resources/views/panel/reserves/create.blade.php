@extends('panel.layout.template')

@section('content')


    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('panel')}}">Home page</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('reservas.index')}}">Reservas de passagens</a>
        </li>
        <li class="breadcrumb-item active">{{$title or 'Gestão de Reservas'}}</li>
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
                    <i class="fa fa-check-square"></i> {{$title or 'Gestão de Reservas'}}
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'reservas.store', 'name' => 'form_add_reserves', 'id' => 'form_add_reserves', 'method' => 'POST', 'files' => true]) !!}
                        @include('panel.reserves.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection