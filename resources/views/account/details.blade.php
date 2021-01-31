@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center">Информация о ссылке <a
                            href="{{ config('app.url') . '/' . $link->code }}">{{ config('app.url') . '/' . $link->code }}</a> ({{ $link->link }})
                    </div>

                    <div class="card-body">
                        <h4>Всего переходов: {{ $link->count }}</h4>
                        <h5>Переходы по странам:</h5>
                        <ul>
                            @foreach($countries as $country => $value)
                                <li>{{ $country }}: {{ $value }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
