@extends('layouts.app')

@section('title')
    <title>{{ $thread->owner->name }}</title>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <div class="level">
                        <span class="flex card-title">
                            <a href="/profiles/{{ $thread->owner->name }}">{{ $thread->owner->name }}</a> posted {{ $thread->title }}
                        </span>
                        @can ('update', $thread)
                            <form action="{{ $thread->path() }}" method='POST'>
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-link">Delete thread</button>
                            </form>
                        @endcan
                    </div>
                </div>

                <div class="card-body">
                    <article>
                        <div class="body">{{ $thread->body }}</div>
                    </article>
                </div>
            </div>
            <div class="card mb-2 mt-2">
                <div class="card-header bg-dark text-white">
                    Replies
                </div>
            </div>
            @foreach($replies as $reply)
                @include('threads.reply')
            @endforeach
            {{ $replies->links() }}

            @if (auth()->check())
                    <div class="card">
                        <div class="card-header text-center bg-dark text-white">Reply to thread</div>
                        <div class="card-body">
                            <form action="{{ $thread->path() . '/replies' }}" method='POST'>
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" id="body" name='body' placeholder="Have something to add?"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type='submit'>Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
            @else
                <div class="row">
                    <p>Please <a href="/login">sign in</a> to participate in the discussion.</p>
                </div>
            @endif
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p>This thread was published {{ $thread->created_at->diffForHumans() }} by
                    <a href="/profiles/{{ $thread->owner->name }}">{{ $thread->owner->name }}</a> and currently has {{ $thread->replies_count }} {{ str_plural('comment', $thread->replies_count) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
