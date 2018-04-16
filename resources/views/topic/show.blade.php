@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Список вопросов по теме {{ $topic->topic }}</h1>

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
                            К списку вопросов
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection