@extends('layouts.app')

@section('title')
    <title>Threads</title>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white">Threads</div>
            </div>
                @forelse($threads as $thread)
                <div class="card">
                    <div class="card-body">
                        <article>
                            <div class="level">
                                <h4 class='flex'>
                                    <a href="{{ $thread->path() }}">
                                        {{ $thread->title }}
                                    </a>
                                </h4>
                                <div>
                                    <p class='card-subtitle'>
                                        <strong>
                                            <a href="{{ $thread->path() }}">{{ $thread->replies_count }} {{ str_plural('reply', $thread->replies_count)}}</a>
                                        </strong>
                                    </p>
                                </div>
                            </div>
                            <p> {{ $thread->body }}</p>
                        </article>
                    </div>
                </div>
                @empty
                    <p>There are no threads in this category.   <a href="/threads">Click to return to threads</a></p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
