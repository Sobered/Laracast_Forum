@component('profiles.activities.activity')
    @slot('activity_information')
        <span class='flex'>
            {{ $profileUser->name }} replied to a thread 
            <a href='{{$record->subject->thread->path() }}'>{{$record->subject->thread->title}}</a> by 
            <a href="/profiles/{{$record->subject->thread->owner->name }}">{{$record->subject->thread->owner->name }}</a>
        </span>
        <div>
            {{$record->subject->created_at->format('H:i m/d/y') }}
        </div>
    @endslot
    @slot('activity_body')
        {{$record->subject->body }}
    @endslot
@endcomponent