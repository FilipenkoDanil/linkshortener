@extends('layouts.app')

@section('title', 'Ваши ссылки')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center">Ваши ссылки</div>

                    <div class="card-body">
                        @if(count($links) > 0)
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Ссылка</th>
                                    <th scope="col">Оригинал</th>
                                    <th scope="col">Переходов</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($links as $link)
                                    <tr>
                                        <td><a href="{{ config('app.url') . '/' .$link->code }}"
                                               target="_blank">{{ config('app.url') . '/' . $link->code }}</a></td>
                                        <td><a href="{{ $link->link }}" target="_blank">{{ $link->link }}</a></td>
                                        <td>{{ $link->count }}</td>
                                        <td>
                                            <div role="group" class="btn-group">
                                                <form action="{{ route('delete-link', $link->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                                </form>

                                                <a href="{{ route('details', $link->id) }}">
                                                    <button class="btn btn-primary">Подробнее</button>
                                                </a>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <h2 class="text-center">Пусто</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
