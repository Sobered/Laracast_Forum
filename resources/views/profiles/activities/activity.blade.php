<div class="card pb-2 mt-2 mb-1 border-bottom">
    <div class="card-header bg-white">
        <div class="level">
            {{ $activity_information }}
        </div>
    </div>
    @if($activity_body)
        <div class="card-body">
                {{ $activity_body }}
        </div>
    @endif
</div>