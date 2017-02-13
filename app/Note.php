<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    /**
     * Scope a query to only include notes of the logged in user.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param integer $userId
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFetchNotesOfUser($query, $userId)
    {
        return $query->where('user_id', $userId)->orderBy('created_at', 'desc');
    }
}
