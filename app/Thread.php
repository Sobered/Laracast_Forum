<?php

namespace App;

use App\User;
use App\Reply;

use App\Channel;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use RecordsActivity;
    protected $guarded = [];
    // protected $with = ['owner'];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($thread) {
            $thread->replies->each->delete();
        });
        // For all queries of Thread, include the count of replies 
        static::addGlobalScope('replyCount', function ($builder) {
            $builder->withCount('replies');
        });
        static::addGlobalScope('owner', function ($builder) {
            $builder->with('owner');
        });
        static::addGlobalScope('channel', function ($builder) {
            $builder->with('channel');
        });
    }


    public function addReply($reply)
    {
        $this->replies()->create($reply);
    }


    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function path()
    {
        return "/threads/{$this->channel->slug}/{$this->id}";
    }


    public function replies()
    {
        return $this->hasMany(Reply::class)
            ->withCount('favorites');
    }

    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }
}

