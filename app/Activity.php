<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $guarded = [];

    public function subject()
    {
        return $this->morphTo();
    }

    public static function feed ($user, $take = 50) {
        // return the 50 most recent activities by the given user, grouped by date, and eager load the subject with each activity
        return static::where('user_id', $user->id)
            ->latest()
            ->with('subject')
            ->take($take)
            ->get()
            ->groupBy(function ($activity) {
                return $activity->created_at->format('d F Y');
            });
        // return $user->activity()->with('subject')->latest()->take(50)->get()->groupBy(function ($activity) {
        //     return $activity->created_at->format('d F Y');
        // });
    }
}
