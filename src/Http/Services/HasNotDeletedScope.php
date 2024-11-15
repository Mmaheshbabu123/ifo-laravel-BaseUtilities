<?php

namespace Packages\IfoBaseUtilities\Http\Services;

use Illuminate\Database\Eloquent\Builder;

trait HasNotDeletedScope
{
    protected static function bootHasNotDeletedScope()
    {
        static::addGlobalScope('notDeleted', function (Builder $builder) {
            $builder->where('is_deleted', false);
        });
    }

    /**
     * Disable the global scope temporarily.
     */
    public function scopeWithDeleted(Builder $builder)
    {
        return $builder->withoutGlobalScope('notDeleted');
    }
}
