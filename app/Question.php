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
        return $this->status == 1;
    }

    public function isModeration()
    {
        return $this->status == 0;
    }

    public function scopeModeration($query)
    {
        return $query->where('status', 0);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
