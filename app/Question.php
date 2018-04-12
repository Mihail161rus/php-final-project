<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * Получаем тему вопроса
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function isActive()
    {
        return $this->status == 'active';
    }

    public function isModeration()
    {
        return $this->status == 'moderation';
    }

    public function countModeration($query)
    {
        return $query->where('status', 'moderation');
    }
}
