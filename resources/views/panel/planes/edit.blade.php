@extends('panel.layout.template')

@section('content')


    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('panel')}}">Home page</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('avioes.index')}}">Aviões</a>
        </li>
        <li class="breadcrumb-item active">{{$title or 'Gestão de Aviões'}}</li>
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
                    <i class="fa fa-plane"></i> {{$title or 'Gestão de Aviões'}}
                </div>
                <div class="card-body">
                    {!! Form::model($plane, ['route' => ['avioes.update', $plane->id], 'name' => 'form_upd_planes', 'id' => 'form_upd_planes', 'method' => 'PUT']) !!}
                        @include('panel.planes.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection