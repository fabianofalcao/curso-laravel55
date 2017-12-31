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
        @include('panel.includes.alerts')
    </div>
    <!-- Final Mensagem de erro -->

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-users"></i> Detalhes do Usuários: {{$user->name}}
                </div>

                <div class="card-body">
                    <ul>
                        <li>
                            Código: <strong>{{$user->id}}</strong>
                        </li>
                        <li>
                            Nome: <strong>{{$user->name}}</strong>
                        </li>
                        <li>
                            E-mail: <strong>{{$user->email}}</strong>
                        </li>
                        <li>
                            É administrador: <strong>{{($user->is_admin ? 'sim' : 'não')}}</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {!! Form::open(['route' => ['usuarios.destroy', $user->id], 'class' => 'form form-search form-ds', 'method' => 'DELETE']) !!}
    <div class="form-group">
        {!! Form::submit('Excluir usuário', ['class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Deseja realmente excluir registro?')"]) !!}
    </div>
    {!! Form::close() !!}

@endsection