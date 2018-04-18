<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question', 'answer', 'author', 'email', 'topic_id', 'status'];

    /**
     * Получаем тему вопроса
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function scopeModeration($query)
    {
        return $query->where('status', 0);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeEmpty($query)
    {
        return $query->where('answer', null)->orderBy('created_at', 'desc');
    }
}
