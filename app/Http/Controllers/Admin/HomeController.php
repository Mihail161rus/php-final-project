<?php

namespace App\Http\Controllers\Admin;

use App\Topic;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Метод возвращает список всех вопросов и вопросов без ответа
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::all();
        $questions = Question::all();
        $questionsEmpty = Question::empty()->get();

        return view('admin.home', compact('topics', 'questions', 'questionsEmpty'));
    }
}
