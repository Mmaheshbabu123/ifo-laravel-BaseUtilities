<?php

namespace Packages\IfoBaseUtilities\Http\Services;

use Illuminate\Database\Eloquent\Model;
use Packages\IfoBaseUtilities\Http\Services\HasNotDeletedScope;

class AbstractModel extends Model
{
    use HasNotDeletedScope;

    protected static function boot()
    { 
        parent::boot();

        /** This method will be triggered before inserting a record */
        static::creating(function (Model $model) {
            if (!isset($model->created_by)) {
                $model->created_by = session('userId');
            }

            if (!isset($model->updated_by)) {
                $model->updated_by = session('userId');
            }
        });

        /** This method will be triggered before updating a record */
        static::updating(function (Model $model) {
            if (!isset($model->updated_by)) {
                $model->updated_by = session('userId');
            }
        });
    }
}