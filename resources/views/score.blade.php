@extends('layouts.appa')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hasil Survey</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Name : {{Auth::user()->name}}
                    <hr/>
                    @foreach ($scores as $score)
                      Answer Yes : {{$score->yes}} &nbsp; &nbsp;
                      <hr/>
                      Resiko : <br/>
                      @if( $score->yes <=21 and $score->yes >= 14 )
                      Resiko Anda terkena penyakit Covid-19 adalah Tinggi
                      @elseif($score->yes <=14 and $score->yes >= 7)
                      Resiko Anda terkena penyakit Covid-19 adalah Sedang
                      @elseif($score->yes <=7)
                      Resiko Anda terkena penyakit Covid-19 adalah Rendah
                      @endif
                    @endforeach
                   

                </div>
            </div>
        </div>
    </div>
</div>
@endsection