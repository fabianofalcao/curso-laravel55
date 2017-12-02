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
        <li class="breadcrumb-item active">{{$title or 'Gestão de Marcas'}}</li>
    </ol>
    <!-- Fim Breadcrumbs-->

    <!-- Titulo da Página -->
    <div class="row">
        <div class="col-12">
            <h2>{{$title or 'Gestão de Marcas'}}</h2>
            <hr/>
        </div>
    </div>

    <!-- Inicio Mensagem de erro -->
    <div class="messages">
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Opss!</strong> {{session('error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Detalhes da marca: {{$brand->name}}
                </div>
                <div class="card-body">
                    <ul>
                        <li>Nome: <strong>{{$brand->name}}</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {!! Form::open(['route' => ['marcas.destroy', $brand->id], 'name' => 'form_del_brands', 'id' => 'form_del_brands', 'method' => 'DELETE']) !!}

    <div class="form-group">
        <!-- <button type="submit" class="btn btn-sm btn-default">Cadastrar</button> -->
        {!! Form::submit('Excluir marca', ['class' => 'btn btn-sm btn-danger']) !!}
    </div>
    {!! Form::close() !!}
@endsection