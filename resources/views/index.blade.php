@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if(session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @error('link')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <form method="post" action="{{route('gen-shorten-link')}}">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" name="link" class="form-control" placeholder="https://www.example.com/" value="{{ session('link') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-outline-danger">Сократить ссылку</button>
                                </div>
                            </div>
                            @guest
                                <small id="emailHelp" class="form-text text-muted">Хотите просматривать статистику по переходам? <a href="{{route('login')}}">Войдите в аккаунт.</a></small>
                            @endguest
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
