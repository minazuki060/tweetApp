@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        {!! Form::open(['route' => 'postTimeline', 'method' => 'POST']) !!}
            {{ csrf_field() }}
            <div class="row mb-4">
                {{ Form::text('text', null, ['class' => 'form-control col-9 mr-auto']) }}
                {{ Form::submit('ツイート', ['class' => 'btn btn-primary col-2']) }}
            </div>
            {{-- エラー表示 ここから --}}
            @if ($errors->has('text'))
                <p class="alert alert-danger">{{ $errors->first('text') }}</p>
            @endif
            {{-- エラー表示 ここまで --}}
        {!! Form::close() !!}
        
        @foreach ($tweets as $tweet)
            <div class="mb-1">
                {{ $tweet->created_at }}
            </div>
            <div class="pl-3">
                {{ $tweet->text }}
            </div>
            <hr>
        @endforeach
    </div>
@endsection