@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Новая тема вопроса
                </div>

                <div class="panel-body">
                    <!--Выводим ошибки если форма заполнена неверно-->
                @include('common.errors)

                <!--Создание нового вопроса-->
                    <form class="form-horizontal" action="{{ url('topic') }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="topic-name" class="col-sm-3 control-label">Тема</label>

                            <div class="col-sm-6">
                                <input class="form-control" type="text" name="name" id="topic-name" value="{{ old('topic') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button class="btn btn-default" type="submit">
                                    Создать тему вопроса
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @if (count($topics) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Доступные темы
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <tr>
                                    <th>Тема</th>
                                    <th>Ответственный</th>
                                    <th>Дата создания</th>
                                    <th>Дата обновления</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($topics as $topic)
                                <tr>
                                    <td class="table-text">{{ $topic->topic }}</td>
                                    <td class="table-text">{{ $topic->user_id }}</td>
                                    <td class="table-text">{{ $topic->created_at }}</td>
                                    <td class="table-text">{{ $topic->updated_at }}</td>
                                    <td>
                                        <form action="{{url('topic/' . $topic->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" id="delete-topic-{{ $topic->id }}" class="btn btn-danger">
                                                Удалить
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection