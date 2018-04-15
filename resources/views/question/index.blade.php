@extends('layouts.app')

@section('content')
    <section class="cd-faq">
        <ul class="cd-faq-categories">
            @foreach ($topics as $topic)
                @if ($topic->questions->where('status', 1)->count() > 0)
                    <li><a href="#{{ $topic->id }}">{{ $topic->topic }}</a></li>
                @endif
            @endforeach
            <li><a href="{{ route('question.create') }}">Задать новый вопрос</a></li>
        </ul>

        <div class="cd-faq-items">
            @foreach ($topics as $topic)
                    <ul id="{{ $topic->id }}" class="cd-faq-group">
                        <li class="cd-faq-title">
                            <h2>{{ $topic->topic }}</h2>
                        </li>
                        @foreach ($questions as $question)
                            @if (!empty($question->answer))
                                <li>
                                    <a href="#" class="cd-faq-trigger">{{ $question->question }}</a>
                                    <div class="cd-faq-content">
                                        <p>{{ $question->answer }}</p>
                                        <hr>
                                        <p>Автор вопроса: {{ $question->author }}</p>
                                        <p>Дата создания: {{ $question->created_at }}</p>
                                        <p>Дата последнего обновления: {{ $question->updated_at }}</p>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
            @endforeach
        </div>
    </section>
@endsection