@extends('site.layout.template')

@section('content-site')

    <div class="content">

        <section class="container">
            <h1 class="title">Resultados Pesquisa:</h1>
            <div class="key-search row">
                <div class="col-lg-2 col-md-2 col-sm-12 col-12 text-center">
                    <img src="{{url('assets/site/images/flight.png')}}" alt="Voô">
                </div>
                <div class="col-lg-10 col-md-10 col-sm-12 col-12">
                    <p>De: <span>{{$origin}}</span></p>
                    <p>Para: <span>{{$destination}}</span></p>
                    <p>Data: <span>{{$date}}</span></p>
                </div>
            </div>

            <div class="row results-search">
                @forelse($flights as $flight)

                <article class="result-search col-12">

                    <span>Saída: <strong>{{$flight->hour_output}}</strong></span>
                    <span>Chegada: <strong>{{$flight->arrival_time}}</strong></span>
                    <span>Paradas: <strong>{{$flight->qty_stops}}</strong></span>
                    <a href="">Comprar</a>

                </article><!--result-search-->
                @empty
                    <p>Nenhum resultado para a pesquisa!</p>
                @endforelse
            </div><!--Row-->
        </section><!--Container-->

    </div>

@endsection