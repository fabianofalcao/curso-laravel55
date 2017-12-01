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
        <li class="breadcrumb-item active">Editar Marcas</li>
    </ol>
    <!-- Fim Breadcrumbs-->

    <!-- Titulo da Página -->
    <div class="row">
        <div class="col-12">
            <h2>Editar Marcas</h2>
            <hr/>
        </div>
    </div>

    <form name="form_edt_brands" id="form_edt_brands" action="{{route('marcas.update', $brand->id)}}" method="post">
        {!! csrf_field() !!}
        {!! method_field('put') !!}
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control form-control-sm" name="name" id="name" value="{{$brand->name}}" placeholder="Nome">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-sm btn-default">Salvar</button>
        </div>
    </form>
@endsection