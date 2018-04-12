<?php

namespace App\Http\Controllers;

use App\Topic;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TopicRepository;

class TopicController extends Controller
{
    /**
     * Экземпляр TopicRepository
     *
     * @var TopicRepository
     */
    protected $topics;

    /**
     * Создание нового экземпляра контроллера
     * @param TopicRepository $topics
     * @return void
     */
    public function __construct(TopicRepository $topics)
    {
        $this->middleware('auth');

        $this->topics = $topics;
    }

    /**
     * Показать список всех тем пользователя
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('topics.index', [
            'topics' => $this->topics->forUser($request->user()),
        ]);
    }

    /**
     * Создание новой темы вопросов
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'topic' => 'required|max:100',
        ]);

        $request->user()->topics()->create([
            'topic' => $request,
        ]);

        return redirect('/topics');
    }
}
