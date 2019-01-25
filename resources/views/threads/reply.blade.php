<reply :attributes='body = {{ $reply }}' inline-template v-cloak>
    <div class="card mb-3" id='reply-{{ $reply->id }}'>
        <div class="card-header bg-white text-dark">
            <div class="level">
                <h5 class="flex">
                    <a href="/profiles/{{ $reply->owner->name }}" class='flex'>{{ $reply->owner->name }}</a> said {{ $reply->created_at->diffForHumans() }}... 
                </h5>
                <div class="button-group">
                    <form action="/replies/{{ $reply->id }}/favorites" method='POST'>
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
            <div v-if='editing'>
                <textarea class='form-control' v-model='body'></textarea>
                <div class="button-group level mt-2">
                    <button class="btn btn-sm btn-primary mr-1" @click='update'>Save</button>
                    <button class="btn btn-sm btn-danger" @click='editing = false'>Cancel</button>
                </div>
            </div>
            <div v-else v-text='body'>
            </div>
        </div>
        @can('update', $reply)
            <div class="card-footer level bg-secondary">
                <button class="btn btn-sm btn-primary mr-1" @click="editing = true">Edit</button>
                <button class="btn-danger btn-sm btn" @click='destroy'>Delete</button>
            </div>
        @endcan
    </div>
</reply>