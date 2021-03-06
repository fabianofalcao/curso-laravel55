@extends('panel.layout.template')

@section('content')


    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('panel')}}">Home page</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('usuarios.index')}}">Usuários</a>
        </li>
        <li class="breadcrumb-item active">{{$title or 'Gestão de Usuários'}}</li>
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
                    <i class="fa fa-users"></i> {{$title or 'Gestão de Usuários'}}
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'usuarios.store', 'name' => 'form_add_users', 'id' => 'form_add_users', 'method' => 'POST', 'files' => true]) !!}
                        @include('panel.users.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection