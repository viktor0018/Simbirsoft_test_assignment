@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Добавить заметку') }}</div>
                <div class="card-body">
                    <form method="POST" action="/addmessage">
                    @csrf
                    <div class="form-group row">
                            <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Текст заметки') }}</label>
                            <div class="col-md-6">
                                <input id="message" type="text" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ old('message') }}" required autocomplete="email" autofocus>
                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @isset($result)
                                    <div class="mt-2">
                                        <strong>{{ $result }}</strong>
                                    </div>
                                @enderror
                            </div>
                     </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Добавить') }}
                            </button>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


