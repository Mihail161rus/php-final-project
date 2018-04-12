@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Новый вопрос
                </div>

                <div class="panel-body">
                    <!--Выводим ошибки если форма заполнена неверно-->
                    @include('common.errors)

                    <!--Создание нового вопроса-->
                    <form class="form-horizontal" action="{{ url('question') }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="question-name" class="col-sm-3 control-label">Вопрос</label>

                            <div class="col-sm-6">
                                <input class="form-control" type="text" name="name" id="question-name" value="{{ old('question') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button class="btn btn-default" type="submit">
                                    Создать вопрос
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Опубликованные вопросы
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <th>Вопрос</th>
                            <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach ($questions as $question)
                                <tr>
                                    <td class="table-text"><div>{{ $question->name }}</div></td>
                                    <td>
                                        <form action="{{url('question/' . $question->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" id="delete-question-{{ $question->id }}" class="btn btn-danger">
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