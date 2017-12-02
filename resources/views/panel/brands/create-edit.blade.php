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

    <!-- Inicio Mensagem de erro -->
    <div class="messages">
        @include('panel.includes.erros')
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-university"></i> {{$title or 'Gestão de Marcas'}}
                </div>
                <div class="card-body">

                @if(isset($brand))
                    <!-- <form name="form_add_brands" id="form_add_brands" action="{{route('marcas.update', $brand->id)}}" method="post"> -->
                    {!! Form::model($brand, ['route' => ['marcas.update', $brand->id], 'name' => 'form_add_brands', 'id' => 'form_add_brands', 'method' => 'PUT']) !!}
                @else
                    <!-- <form name="form_add_brands" id="form_add_brands" action="{{route('marcas.store')}}" method="post"> -->
                        {!! Form::open(['route' => 'marcas.store', 'name' => 'form_add_brands', 'id' => 'form_add_brands', 'method' => 'POST']) !!}
                    @endif

                    <div class="form-group">
                        <label for="name">Nome</label>
                    <!-- <input type="text" class="form-control form-control-sm" name="name" id="name" value="{{old('name')}}" placeholder="Nome"> -->
                        {!! Form::text('name', null, ['class' => "form-control form-control-sm", 'id' => "name", 'placeholder' => "Nome"]) !!}
                    </div>

                    <div class="form-group">
                        <!-- <button type="submit" class="btn btn-sm btn-default">Cadastrar</button> -->
                        {!! Form::submit('Cadastrar', ['class' => 'btn btn-sm btn-default']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection