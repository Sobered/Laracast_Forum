<div class="form-group">
        <label for="channel_id">Category</label>
        <select name="channel_id" id="inputChannel" class="form-control" required>
            <option value="">Select category...</option>
            @foreach($channels as $channel)
                <option value="{{ $channel->id }}">{{ $channel->name }}</option>
            @endforeach
        </select>
    </div>