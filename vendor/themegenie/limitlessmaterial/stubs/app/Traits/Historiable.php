<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

trait Historiable
{
    public function histories()
    {
        $tableName = Str::singular($this->table);
        $historiesTable = $tableName . '_histories';
        $this->setTable($historiesTable);
        return new HasMany($this->newQuery(), $this, $historiesTable . '.' . $tableName . '_id', 'id');
    }

    public static function bootHistoriable()
    {
        static::created(function ($model) {
            $singularTableName = Str::singular($model->table);
            $data = $model->attributes;
            $data[$singularTableName . '_id'] = $data['id'];
            $data['action'] = 'created';
            unset($data['id']);
            DB::connection($model->connection)->table($singularTableName . '_histories')->insert($data);
        });

        static::updated(function ($model) {
            $singularTableName = Str::singular($model->table);
            $data = $model->attributes;
            $data[$singularTableName . '_id'] = $data['id'];
            $data['action'] = 'updated';
            unset($data['id']);
            DB::connection($model->connection)->table($singularTableName . '_histories')->insert($data);
        });

        static::deleted(function ($model) {
            $singularTableName = Str::singular($model->table);
            $data = $model->attributes;
            $data[$singularTableName . '_id'] = $data['id'];
            $data['action'] = 'deleted';
            unset($data['id']);
            DB::connection($model->connection)->table($singularTableName . '_histories')->insert($data);
        });
    }
}
