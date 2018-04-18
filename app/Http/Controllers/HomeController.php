<?php

namespace App\Http\Controllers;

use App\Topic;
use App\Question;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::all();
        $questions = Question::all();
        $questionsWithoutAnswer = Question::moderation();
        return view('home', compact('topics', 'questions', 'questionsWithoutAnswer'));
    }
}
