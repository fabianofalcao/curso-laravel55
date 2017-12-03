@extends('panel.layout.template')

@section('content')


    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href=""{{route('panel')}}>Home page</a>
        </li>
        <li class="breadcrumb-item active">Estados Brasileiros</li>
    </ol>
    <!-- Fim Breadcrumbs-->

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-globe"></i> {{$title or "Estados Brasileiros"}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-search pull-right">
                            {!! Form::open(['route' => 'estados.search', 'class' => 'form form-inline']) !!}
                                {!! Form::text('key_search', null, ['placeholder' => 'O que deseja encontar?']) !!}
                                <button class="btn btn-sm btn-dark">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    Pesquisar
                                </button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-sm table-bordered margin-top20" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Sigla</th>
                                <th width="280" class="text-center">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($states as $state)
                                <tr>
                                    <td>{{$state->name}}</td>
                                    <td>{{$state->initials}}</td>
                                    <td class="text-center">
                                        #Ações

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="200">Nenhuma marca cadastrada!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        @if(isset($dataForm))
                            {!!  $states->appends($dataForm)->links('vendor.pagination.bootstrap-4') !!}
                        @else
                            {!! $states->links('vendor.pagination.bootstrap-4') !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection