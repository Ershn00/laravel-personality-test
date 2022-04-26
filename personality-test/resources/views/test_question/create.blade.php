@extends('layout')
@section('content')
    <div class="col-sm-3 mb-3">
        <a href="{{ route('questions.index') }}" type="button" class="btn btn-primary btn-sm">Back to List</a>
    </div>
    <div class="card">
        <div class="card-header">
            Add Question
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('questions.store') }}">
                <div class="mb-3">
                    @csrf
                    <label for="question">Question:</label>
                    <input type="text" class="form-control" name="question"/>
                </div>
                <div class="mb-3">
                    <label for="choice_1">Choice #1:</label>
                    <input type="text" class="form-control" name="choice_1"/>
                    <label for="choice_2">Choice #2:</label>
                    <input type="text" class="form-control" name="choice_2"/>
                    <label for="choice_3">Choice #3:</label>
                    <input type="text" class="form-control" name="choice_3"/>
                    <label for="choice_4">Choice #4:</label>
                    <input type="text" class="form-control" name="choice_4"/>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-block btn-primary">Create Question</button>
                </div>
            </form>
        </div>
    </div>
@endsection
