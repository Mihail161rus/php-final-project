@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Список администраторов</h1>

        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Логин</th>
                <th>Email</th>
                <th>Операции</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->login }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('admin.user.edit', [$user->id]) }}" role="button">Изменить пароль</a>
                        @if (count($users) != 1)
                            <form action="{{ route('admin.user.destroy', [$user->id]) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>

        <a class="btn btn-success" href="{{ route('admin.user.create') }}">Добавить администратора</a>
    </div>
@endsection