@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Главная') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                    <b>Имя: </b> {{$username}}
                    </div>
                    <div>
                    <b>Дата регистрации: </b> {{$registerdate}}
                    </div>
                    <div>
                    <b>Количество заметок: </b> {{$postcount}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
