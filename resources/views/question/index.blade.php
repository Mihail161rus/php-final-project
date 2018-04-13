@extends('layouts.app')

@section('content')
    <section class="cd-faq">
        <ul class="cd-faq-categories">
            @foreach ($topics as $topic)
                @if ($topic->questions->where('status', 'active')->count() > 0)
                    <li><a href="#{{ $topic->id }}">{{ $topic->topic }}</a></li>
                @endif
            @endforeach
            <li><a href="{{ route('question.create') }}">Задать новый вопрос</a></li>
        </ul>
    </section>
@endsection