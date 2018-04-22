<?php

namespace App\Http\Controllers\Admin;

use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class TopicController extends Controller
{
    /**
     * Возвращает список всех созданных тем для вопросов
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::all();
        return view('admin.topic.index', compact('topics'));
    }

    /**
     * Выводит форму для создания новой темы
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.topic.create');
    }

    /**
     * Метод сохраняет вновь созданную тему в БД
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'topic' => 'required|min:3|max:80|unique:topics,topic',
        ]);

        $topicRequest = $request->all();
        $topicRequest['user_id'] = Auth::user()->id;

        Topic::create($topicRequest);
        return redirect()->route('admin.topic.index');
    }

    /**
     * Отображает данные по выбранной теме
     *
     * @param  \App\Topic $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        return view('admin.topic.show', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topic $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topic $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        //
    }

    /**
     * Удаляет выбранную тему из БД
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        $topic->delete();
        return redirect()->route('admin.topic.index');
    }
}
