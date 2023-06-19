<?php

namespace App\Traits;

use App\Observers\UserTracking;
use Illuminate\Database\Eloquent\SoftDeletes;

trait UserTrackable
{

    public static function bootUserTrackable()
    {
        static::observe(new UserTracking());
    }

    /**
     * Get the user who create the model.
     */
    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }

    /**
     * Get the user who update the model.
     */
    public function updater()
    {
        return $this->belongsTo('App\Models\User', 'updated_by', 'id');
    }

    /**
     * Get the user who delete the model.
     */
    public function destroyer()
    {
        return $this->belongsTo('App\Models\User', 'deleted_by', 'id');
    }
}
