@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($questionsEmpty) != 0)
            <h1>Список вопросов без ответа</h1>

                <table class="table table-hover">
                    <tr>
                        <th>#</th>
                        <th>Тема вопроса</th>
                        <th>Автор</th>
                        <th>Email</th>
                        <th>Вопрос</th>
                        <th>Ответ</th>
                        <th>Статус</th>
                        <th>Дата создания</th>
                        <th>Дата обновления</th>
                        <th>Действия</th>
                    </tr>
                    @foreach ($questionsEmpty as $questionEmpty)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $questionEmpty->topic->topic }}</td>
                            <td>{{ $questionEmpty->author }}</td>
                            <td>{{ $questionEmpty->email }}</td>
                            <td>{{ $questionEmpty->question }}</td>
                            <td>{{ $questionEmpty->answer }}</td>
                            <td>
                                @if ($questionEmpty->status === 0)
                                    <span style="color: orange">ожидает ответа</span>
                                @elseif ($questionEmpty->status === 1)
                                    <span style="color: green">опубликован</span>
                                @else
                                    <span style="color: red">скрыт</span>
                                @endif
                            </td>
                            <td>{{ $questionEmpty->created_at }}</td>
                            <td>{{ $questionEmpty->updated_at }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('admin.question.edit', [$questionEmpty->id]) }}" role="button">
                                    Редактировать вопрос
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
        @else
            <h1>Вопросов без ответов не найдено</h1>
        @endif
            <hr>
            <h1>Список вопросов по каждой теме</h1>
            <hr>
            @foreach ($topics as $topic)
                @if ($topic->questions->count() > 0)
                    <h2>{{ $topic->topic }}</h2>
                    <table class="table table-hover">
                        <tr>
                            <th>#</th>
                            <th>Автор</th>
                            <th>Email</th>
                            <th>Вопрос</th>
                            <th>Ответ</th>
                            <th>Статус</th>
                            <th>Дата создания</th>
                            <th>Дата обновления</th>
                            <th>Действия</th>
                        </tr>
                        @foreach ($topic->questions as $question)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $question->author }}</td>
                                <td>{{ $question->email }}</td>
                                <td>{{ $question->question }}</td>
                                <td>{{ $question->answer }}</td>
                                <td>
                                    @if ($question->status === 0)
                                        <span style="color: orange">ожидает ответа</span>
                                    @elseif ($question->status === 1)
                                        <span style="color: green">опубликован</span>
                                    @else
                                        <span style="color: red">скрыт</span>
                                    @endif
                                </td>
                                <td>{{ $question->created_at }}</td>
                                <td>{{ $question->updated_at }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('admin.question.edit', [$question->id]) }}" role="button">
                                        Редактировать вопрос
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            @endforeach
    </div>
@endsection
