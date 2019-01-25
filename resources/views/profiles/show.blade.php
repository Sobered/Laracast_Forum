@extends('layouts.app')

@section('title')
    <title>{{ $profileUser->name }} profile</title>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="pb-2 mt-4 mb-2 border-bottom">
                    <h1>
                        {{ $profileUser->name }}
                        <small> joined {{ $profileUser->created_at->diffForHumans() }}</small>
                    </h1>
                </div>
                @foreach($activities as $date => $activity)
                    <div class="card-header bg-dark text-white text-center">
                        {{ $date }}
                    </div>
                    @foreach ($activity as $record)
                            @include ("profiles.activities.{$record->type}")
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
@endsection