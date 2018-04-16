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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection