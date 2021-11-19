@extends('layouts.app')

@section('content')
    @if(Auth::check())
    
        <h1>{{ Auth::user()->name }}さんのタスク一覧</h1>
    
        @if (count($tasks) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>状況</th>
                    <th>タスク</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td>{!! link_to_route('tasks.show', $task->id, ['task' => $task->id]) !!}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->content }}</td>
                </tr>
                @endforeach
                  {{-- ページネーションのリンク --}}
                {{ $tasks->links() }}
            </tbody>
        </table>
        @else
            {!! link_to_route('tasks.create', '新規タスクの投稿', [], ['class' => 'btn btn-primary']) !!}
        @endif
        
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
    