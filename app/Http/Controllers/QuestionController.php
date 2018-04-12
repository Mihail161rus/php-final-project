<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Topic;
use App\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class QuestionController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $topics = Topic::all();
        $questions = Question::all();
        return view('questions.index', compact('topics', 'questions'));
    }

    public function store(QuestionRequest $request)
    {
        $request->user()->questions()->create([
            'name' => $request->question,
        ]);

        return redirect('/questions');
    }
}
