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
       @if(isset($errors) && $errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Erro!</strong>
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>
                                {{$e}}
                            </li>
                        @endforeach
                    </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

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
            <button type="submit" class="btn btn-sm btn-default">Cadastrar</button>
        </div>
    </form>
@endsection