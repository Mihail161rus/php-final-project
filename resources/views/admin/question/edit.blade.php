@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Форма редактирования вопроса</div>

                    <div class="card-body">
                        <form role="form" action="{{ route('admin.question.update', [$question->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group">
                                <label for="authorName">Автор</label>
                                <input type="text" class="form-control" id="authorName" name="author" required value="{{ $question->author }}">
                            </div>
                            <div class="form-group">
                                <label for="authorEmail">Email</label>
                                <input type="email" class="form-control" id="authorEmail" name="email" required value="{{ $question->email }}">
                            </div>
                            <div class="form-group">
                                <label for="topicsList">Тема вопроса</label>
                                <select class="form-control" name="topic_id" id="topicsList">
                                    <option value="{{ $question->topic->id }}">{{ $question->topic->topic }}</option>
                                    @foreach ($topics as $topic)
                                        @if ($topic->id !== $question->topic->id)
                                            <option value="{{ $topic->id }}">{{ $topic->topic }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="questionText">Вопрос</label>
                                <div>
                                    <textarea class="form-control" name="question" id="questionText" rows="10" required>
                                    {{ $question->question }}
                                </textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection