<div class="card">
    <div class="card-header bg-white text-dark">
        <div class="level">
                <h5 class="flex">
                    <a href="/profiles/{{ $reply->owner->name }}" class='flex'>{{ $reply->owner->name }}</a> said {{ $reply->created_at->diffForHumans() }}... 
                </h5>
            <div>
                
                <form action="/replies/{{ $reply->id }}/favorites" method='POST'>
                    @csrf
                    <button class="btn btn-outline-primary btn-sm" 
                            type='submit' {{ $reply->isFavorited()? 'disabled' : '' }}
                            >
                            {{ $reply->favorites_count }} @if($reply->favorites_count == 0) likes @else {{ str_plural('like', 1) }} @endif 
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="body">{{ $reply->body }}</div>
    </div>
</div>