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
        @include('panel.includes.alerts')
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-plane"></i> Detalhes do avião: {{$plane->id}}
                </div>
                <div class="card-body">
                    <ul>
                        <li>Nome: <strong>{{$plane->name}}</strong></li>
                        <li>Quantidade de passageiros: <strong>{{$plane->qty_passengers}}</strong></li>
                        <li>Marca: <strong>{{$brand}}</strong></li>
                        <li>Classe: <strong>{{$plane->class}}</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {!! Form::open(['route' => ['avioes.destroy', $plane->id], 'name' => 'form_del_planes', 'id' => 'form_del_planes', 'method' => 'DELETE']) !!}

    <div class="form-group">
        <!-- <button type="submit" class="btn btn-sm btn-default">Cadastrar</button> -->
        {!! Form::submit('Excluir avião', ['class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Deseja realmente excluir registro?')"]) !!}
    </div>
    {!! Form::close() !!}
@endsection