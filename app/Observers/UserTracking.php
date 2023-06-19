<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserTracking
{
    /**
     * Listen to the Model creating event.
     *
     * @param  Model $model
     * @return void
     */
    public function creating(Model $model)
    {
        if (Auth::check()) {
            $model->created_by = Auth::user()->id;
        }
    }

    /**
     * Listen to the Model updating event.
     *
     * @param  Model $model
     * @return void
     */
    public function updating(Model $model)
    {
        if (Auth::check()) {
            $model->updated_by = Auth::user()->id;
        }
    }

    /**
     * Listen to the Model deleting event.
     *
     * @param  Model $model
     * @return void
     */
    public function deleted(Model $model)
    {
        $connectionName = config('database.default');
        $tableName = $model->getTable();
        $isColExist = \Illuminate\Support\Facades\Schema::connection($connectionName)->hasColumn($tableName, 'deleted_by');
        if (Auth::check() && $isColExist) {
            $model->deleted_by = Auth::user()->id;
            $model->save();
        }
    }

    /**
     * Listen to the Model deleting event.
     *
     * @param  Model $model
     * @return void
     */
    public function restoring(Model $model)
    {
        $model->deleted_by = null;
        $model->save();
    }
}
