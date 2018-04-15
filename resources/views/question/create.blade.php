@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Форма создания вопроса</div>
                    <div class="card-body">
                        <form class="form-create" role="form" action="{{ route('question.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="authorName">Ваше имя</label>
                                <input type="text" class="form-control" id="authorName" name="author" required value="{{ old('author') }}">
                            </div>
                            <div class="form-group">
                                <label for="authorEmail">Ваш Email</label>
                                <input type="email" class="form-control" id="authorEmail" name="email" required value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="topicsList">Выберите тему вопроса</label>
                                <select class="form-control" name="topic_id" id="topicsList">
                                    @foreach ($topics as $topic)
                                        <option value="{{ $topic->id }}">{{ $topic->topic }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="questionText">Вопрос</label>
                                <div>
                                    <textarea class="form-control" name="question" id="questionText" rows="10" required>
                                    {{ old('question') }}
                                </textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Отправить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection