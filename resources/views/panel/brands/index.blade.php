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
                    <i class="fa fa-university"></i> Detalhes da marca
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-search pull-right">
                                <!-- <form class="form form-inline"> -->
                            {!! Form::open(['route' => 'marcas.search', 'class' => 'form form-inline']) !!}
                            <!-- <input type="text" name="nome" placeholder="Nome:" class="form-control form-control-sm"> -->
                                {!! Form::text('key_search', null, ['placeholder' => 'O que deseja encontar?']) !!}
                                <button class="btn btn-sm btn-dark">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    Pesquisar
                                </button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    @if(isset($dataForm['key_search']))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-secondary margin-top10">
                                    <a href=""><i class="fa fa-refresh" aria-hidden="true"></i>
                                    Resultados para: <strong>{{$dataForm['key_search']}}</strong></a>
                                </div>
                            </div>
                        </div>
                    @endif

                <!-- Botão de adicionar -->
                    <a href="{{route('marcas.create')}}" class="btn btn-sm btn-dark margin-bottom20">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        Adicionar marca
                    </a>
                    <!-- Fim botão de adicionar-->

                    <div class="table-responsive">
                        <table class="table table-sm table-bordered" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th width="280" class="text-center">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($brands as $brand)
                                <tr>
                                    <td>{{$brand->name}}</td>
                                    <td class="text-center">
                                        <a href="{{route('marcas.show', $brand->id)}}" class="btn btn-sm btn-secondary">Visualizar</a>
                                        <a href="{{route('marcas.edit', $brand->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                        <a href="{{route('marcas.avioes', $brand->id)}}" class="btn btn-sm btn-dark">Aviões</a>
                                        <!-- <a href="" class="btn btn-sm btn-danger">Excluir</a> -->
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="200">Nenhuma marca cadastrada!</td>
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
                            {!!  $brands->appends($dataForm)->links('vendor.pagination.bootstrap-4') !!}
                        @else
                            {!! $brands->links('vendor.pagination.bootstrap-4') !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>









@endsection