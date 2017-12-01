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
            <h2>Marcas de Aviões</h2>
            <hr/>
        </div>
    </div>
    <!-- Fim do Título da Página -->

    <!-- Inicio Mensagem de erro -->
    <div class="messages">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sucesso.</strong> {{session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Erro.</strong> {{session('error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>



    <!-- Fim Mensagem de erro -->

    <div class="content-din bg-white">

        <div class="form-search">
            <form class="form form-inline">
                <input type="text" name="nome" placeholder="Nome:" class="form-control form-control-sm">
                <button class="btn btn-sm btn-dark">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    Pesquisar
                </button>
            </form>
        </div>

        <!-- Botão de adicionar -->
        <a href="{{route('marcas.create')}}" class="btn btn-sm btn-dark margin-top20 margin-bottom20">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
            Adicionar marca
        </a>
        <!-- Fim botão de adicionar-->

        <table class="table table-striped">
            <tr>
                <th>Nome</th>
                <th width="150">Ações</th>
            </tr>

            @forelse($brands as $brand)
                <tr>
                    <td>{{$brand->name}}</td>
                    <td>
                        <a href="{{route('marcas.edit', $brand->id)}}" class="btn btn-sm btn-primary">Editar</a>
                        <a href="" class="btn btn-sm btn-danger">Excluir</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="200">Nenhuma marca cadastrada!</td>
                </tr>
            @endforelse
        </table>

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

    </div><!--Content Dinâmico-->


@endsection