<div class="card" id='reply-{{ $reply->id }}'>
    <div class="card-header bg-white text-dark">
        <div class="level">
            <h5 class="flex">
                <a href="/profiles/{{ $reply->owner->name }}" class='flex'>{{ $reply->owner->name }}</a> said {{ $reply->created_at->diffForHumans() }}... 
            </h5>
            <div class="button-group row">
                @can('update', $reply)
                    <form action="/replies/{{ $reply->id }}" method='POST' class='col-xs-6 mr-2'>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger btn-sm float-right" type='submit'>Delete</button>
                    </form>
                @endcan
                <form action="/replies/{{ $reply->id }}/favorites" method='POST' class='col-xs-6'>
                    @csrf
                    <button class="btn btn-outline-primary btn-sm" 
                            type='submit' {{ $reply->isFavorited()? 'disabled' : '' }}
                            >
                            {{ $reply->favorites_count }}&nbsp;&nbsp;<i class='material-icons small'>thumb_up</i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="body">{{ $reply->body }}</div>
    </div>
</div>