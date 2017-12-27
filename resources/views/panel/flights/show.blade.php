@extends('panel.layout.template')

@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('panel')}}">Home page</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('voos.index')}}">Voos</a>
        </li>
        <li class="breadcrumb-item active">{{$title or 'Gestão de Voos'}}</li>
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
                    <i class="fa fa-fighter-jet"></i> Detalhes do voo: {{$flight->id}}
                </div>

                <div class="card-body">
                    <ul>
                        <li>
                            Código: <strong>{{$flight->id}}</strong>
                        </li>
                        <li>
                            Origem: <strong>{{$flight->origin->name}}</strong>
                        </li>
                        <li>
                            Destino: <strong>{{$flight->destination->name}}</strong>
                        </li>
                        <li>
                            Data: <strong>{{$flight->date}}</strong>
                        </li>
                        <li>
                            Duração: <strong>{{$flight->time_duration}}</strong>
                        </li>
                        <li>
                            Saída: <strong>{{$flight->hour_output}}</strong>
                        </li>
                        <li>
                            Chegada: <strong>{{$flight->arrival_time}}</strong>
                        </li>
                        <li>
                            Valor Anterior: <strong>{{$flight->old_price}}</strong>
                        </li>
                        <li>
                            Valor Atual: <strong>{{$flight->price}}</strong>
                        </li>
                        <li>
                            Total de Parcelas: <strong>{{$flight->total_plots}}</strong>
                        </li>
                        <li>
                            Promoção: <strong>{{$flight->is_promotion}}</strong>
                        </li>
                        <li>
                            Paradas: <strong>{{$flight->qty_stops}}</strong>
                        </li>
                        <li>
                            Descrição: <strong>{{$flight->description}}</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {!! Form::open(['route' => ['voos.destroy', $flight->id], 'class' => 'form form-search form-ds', 'method' => 'DELETE']) !!}
    <div class="form-group">
        {!! Form::submit('Excluir voo', ['class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Deseja realmente excluir registro?')"]) !!}
    </div>
    {!! Form::close() !!}

@endsection