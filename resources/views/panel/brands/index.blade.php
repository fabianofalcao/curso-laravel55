@extends('panel.layout.template')

@section('content')


    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Home page</a>
        </li>
        <li class="breadcrumb-item active">Marcas</li>
    </ol>
    <!-- Fim Breadcrumbs-->

    <!-- Titulo da Página -->
    <div class="row">
        <div class="col-12">
            <h1>Marcas de Aviões</h1>
            <hr/>
        </div>
    </div>
    <!-- Fim do Título da Página -->

    <!-- Botão de adicionar -->
    <a href="{{route('marcas.create')}}" class="btn btn-sm btn-dark">
        <i class="fa fa-plus-circle" aria-hidden="true"></i>
        Adicionar marca
    </a>
    <!-- Fim botão de adicionar-->

@endsection