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

    /**
     * Метод возвращает вопросы со статусом "ожидает ответа"
     *
     * @param $query
     * @return mixed
     */
    public function scopeModeration($query)
    {
        return $query->where('status', 0);
    }

    /**
     * Метод возвращает вопросы со статусом "активно"
     *
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Метод возвращает вопросы с пустым ответом
     *
     * @param $query
     * @return mixed
     */
    public function scopeEmpty($query)
    {
        return $query->where('answer', null)->orderBy('created_at', 'desc');
    }
}
