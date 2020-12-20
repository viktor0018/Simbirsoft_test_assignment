@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if (count($messages) == 0)
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between">
                   Ошибка:
                </div>
                <div class="card-body">
                    В базе данных нет сообщений.
                </div>
            </div>
        @else
            @foreach ($messages as $message)
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between">
                        <div><b>Автор:</b> {{ $message->author->name }}</div>
                        <div><b>Создано:</b> {{ \Carbon\Carbon::createFromTimeStamp(strtotime($message->created_at))->diffForHumans() }}</div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <b>Сообщение:</b> {{ $message->message }}
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="mt-3 d-flex align-items-center justify-content-center">
            {{ $messages->links() }}
            </div>
        @endif
        </div>
    </div>
</div>
@endsection
