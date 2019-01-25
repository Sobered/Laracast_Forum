@component('profiles.activities.activity')
    @slot('activity_information')
        <span class='flex'>
            <a href="{{ $record->subject->favorited->path() }}">
                {{ $profileUser->name }} favorited a reply 
            </a>
        </span>
        <div>
        </div>
    @endslot
    @slot('activity_body')
        {{ $record->subject->favorited->body }}
    @endslot
@endcomponent