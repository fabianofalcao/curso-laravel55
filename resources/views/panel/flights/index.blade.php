@extends('panel.layout.template')

@section('content')


    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Home page</a>
        </li>
        <li class="breadcrumb-item active">Voos</li>
    </ol>
    <!-- Fim Breadcrumbs-->

    <!-- Titulo da Página
    <div class="row">
        <div class="col-12">
            <h2>Marcas de Aviões</h2>
            <hr/>
        </div>
    </div>
    <!-- Fim do Título da Página -->

    <!-- Inicio Mensagem de erro -->
    <div class="messages">
        @include('panel.includes.alerts')
    </div>
    <!-- Fim Mensagem de erro -->

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-fighter-jet"></i> Voos Cadastrados
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-search pull-right">
                                <!-- <form class="form form-inline"> -->
                            {!! Form::open(['route' => 'voos.search', 'class' => 'form form-inline']) !!}
                            <!-- <input type="text" name="nome" placeholder="Nome:" class="form-control form-control-sm"> -->
                                {!! Form::number('code', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Código']) !!}
                                {!! Form::date('date', null, ['class' => 'form-control form-control-sm']) !!}
                                {!! Form::time('hour_output', null, ['class' => 'form-control form-control-sm']) !!}
                                {!! Form::number('total_stops', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Total Paradas']) !!}
                                {!! Form::select('origin', $airports, null, ['class' => 'form-control form-control-sm']) !!}
                                {!! Form::select('destination', $airports, null, ['class' => 'form-control form-control-sm']) !!}

                                <button class="btn btn-sm btn-dark">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    Pesquisar
                                </button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    @if(isset($dataForm))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-secondary margin-top10">
                                    <a href="{{route('voos.index')}}"><i class="fa fa-refresh" aria-hidden="true"></i>
                                    </a>
                                    @if( isset($dataForm['code']) )
                                        <p>Código: <strong>{{$dataForm['code']}}</strong></p>
                                    @endif

                                    @if( isset($dataForm['date']) )
                                        <p>Data: <strong>{{formatDateAndTime($dataForm['date'])}}</strong></p>
                                    @endif

                                    @if( isset($dataForm['hour_output']) )
                                        <p>Hora de Saída: <strong>{{$dataForm['hour_output']}}</strong></p>
                                    @endif

                                    @if( isset($dataForm['total_stops']) )
                                        <p>Total de Paradas: <strong>{{$dataForm['total_stops']}}</strong></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                @endif

                <!-- Botão de adicionar -->
                    <a href="{{route('voos.create')}}" class="btn btn-sm btn-dark margin-bottom20">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        Adicionar voo
                    </a>
                    <!-- Fim botão de adicionar-->

                    <div class="table-responsive">
                        <table class="table table-sm table-bordered" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Imagem</th>
                                <th>Origem</th>
                                <th>Destino</th>
                                <th>Paradas</th>
                                <th>Data</th>
                                <th>Saída</th>
                                <th width="200" class="text-center">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($flights as $flight)
                                <tr>
                                    <td>{{$flight->id}}</td>
                                    <td>
                                    @if($flight->image)
                                        <img src="{{url("storage/flights/{$flight->image}")}}" alt="{{$flight->id}}" style="max-width: 60px;">
                                    @else
                                        <img src="{{url('assets/panel/imgs/no-image.png')}}" alt="{{$flight->id}}" style="max-width: 100px;">
                                    @endif
                                    </td>
                                    <td>{{$flight->origin->name}}</td>
                                    <td>{{$flight->destination->name}}</td>
                                    <td>{{$flight->qty_stops}}</td>
                                    <td>{{formatDateAndTime($flight->date)}}</td>
                                    <td>{{formatDateAndTime($flight->hour_output, 'H:i')}}</td>
                                    <td class="text-center">
                                        <a href="{{route('voos.show', $flight->id)}}" class="btn btn-sm btn-secondary">Visualizar</a>
                                        <a href="{{route('voos.edit', $flight->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="200">Nenhum voo cadastrado!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>


                        <!--
                        <nav aria-label="Page navigation example">

                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>

                    </nav>
                    -->
                        @if(isset($dataForm))
                            {!!  $flights->appends($dataForm)->links('vendor.pagination.bootstrap-4') !!}
                        @else
                            {!! $flights->links('vendor.pagination.bootstrap-4') !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>









@endsection