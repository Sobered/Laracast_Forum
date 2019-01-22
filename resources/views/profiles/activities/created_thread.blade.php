@component('profiles.activities.activity')
    @slot('activity_information')
        <span class='flex'>
            {{ $profileUser->name }} made thread <a href="{{ $record->subject->path() }}">{{ $record->subject->title }}</a>
        </span>
        <div>
            {{ $record->subject->created_at->format('H:i m/d/y') }}
        </div>
    @endslot

    @slot('activity_body')
        {{ $record->subject->body }}
    @endslot
@endcomponent
