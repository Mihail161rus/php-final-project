@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Список администраторов</h1>

        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Логин</th>
                <th>Email</th>
                <th>Роль</th>
                <th>Операции</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->login }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('admin.user.edit', [$user->id]) }}" role="button">Изменить пароль</a>
                        @if ($user->role != 'admin')
                        <a class="btn btn-danger" href="{{ route('admin.user.destroy', [$user->id]) }}" role="button">Удалить</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection