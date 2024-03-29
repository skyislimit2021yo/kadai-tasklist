@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name}}
        
        <div class="col-sm-8">
            @include('tasks.index')
        </div>

    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Tasklist</h1>
                {{--ユーザー登録ページへのリンク--}}
                {!! link_to_route('signup.get', 'Sign up Now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection