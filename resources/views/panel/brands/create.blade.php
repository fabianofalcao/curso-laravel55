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
        <li class="breadcrumb-item active">Adicionar Marcas</li>
    </ol>
    <!-- Fim Breadcrumbs-->

    <!-- Titulo da Página -->
    <div class="row">
        <div class="col-12">
            <h1>Adicionar Marcas de Aviões</h1>
            <hr/>
        </div>
    </div>

    <form name="form_add_brands" id="form_add_brands" action="{{route('marcas.store')}}" method="post">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nome">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-default">Cadastrar</button>
        </div>
    </form>
@endsection