@extends('layouts.app')

@section('content')
    <div class="container">
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
            <tr>
                <td>{{ $loop }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
@endsection
