<?php

namespace App;

trait RecordsActivity
{
    protected static function bootRecordsActivity()
    {
        // Do nothing if there is no logged in user
        if (auth()->guest()) return ;


        foreach (static::getActivitiesToRecord() as $event) {
            // makes a call to methods built into Model that match strings in
            // getActivitiesToRecord
            // ie  Model::created or Model::deleted
            static::$event(function($model) use ($event) {
                $model->recordActivity($event);
            });
        }

        static::deleting(function ($model) {
            $model->activity()->delete();
        });
    }

    /**
     *  Override this in each model to include the events you want to record
     * ie. created, deleted, edited, etc
     */
    protected static function getActivitiesToRecord()
    {
        return ['created'];
    }
    protected function recordActivity($event)
    {
        $this->activity()->create([
            'user_id' => auth()->id(),
            'type' => $this->getActivityType($event)
        ]);
    }

    public function activity()
    {
        return $this->morphMany('App\Activity', 'subject');
    }
    
    protected function getActivityType($event)
    {
        $type = strtolower((new \ReflectionClass($this))->getShortName());
        return $event . '_' . $type;
    }
}
