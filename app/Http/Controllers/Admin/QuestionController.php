<?php

namespace App\Http\Controllers\Admin;

use App\Topic;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Requests\QuestionRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Возвращает форму для редактирования конкретного вопроса
     *
     * @param  \App\Question $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $topics = Topic::all();
        return view('admin.question.edit', compact('topics', 'question'));
    }

    /**
     * Обновляет данные по изменяемому вопросу
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question $question
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, Question $question)
    {
        $question->update($request->all());
        return redirect()->route('admin.home');
    }

    /**
     * Удаляет конкретный вопрос из БД
     *
     * @param  \App\Question $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('admin.home');
    }
}
